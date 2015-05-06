<?php

namespace app\modules\admfarmacia;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemsParteSalida;

/**
 * ItemsParteSalidaSearch represents the model behind the search form about `app\models\ItemsParteSalida`.
 */
class ItemsParteSalidaSearch extends ItemsParteSalida
{
	public $Descripcion;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idItem', 'idParte', 'idInsumo', 'Cantidad'], 'integer'],
            [['Descripcion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ItemsParteSalida::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
        	$query->joinWith(['idInsumo0']);
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idItem' => $this->idItem,
            'idParte' => $this->idParte,
            'idInsumo' => $this->idInsumo,
            'Cantidad' => $this->Cantidad,
        ]);
        $query->joinWith(['idInsumo0'=>function ($q){
        	$q->where('insumos.Descripcion LIKE "%'.
        			$this->Descripcion . '%"');
        }
        ]);

        return $dataProvider;
    }
}
