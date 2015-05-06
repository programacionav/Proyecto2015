<?php

namespace app\modules\admfarmacia;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insumos;

/**
 * InsumosSearch represents the model behind the search form about `app\models\Insumos`.
 */
class InsumosSearch extends Insumos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInsumo', 'NroSerie', 'idProveedor', 'Stock'], 'integer'],
            [['FechaVencimiento', 'Descripcion'], 'safe'],
            [['Precio'], 'number'],
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
        $query = Insumos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idInsumo' => $this->idInsumo,
            'NroSerie' => $this->NroSerie,
            'idProveedor' => $this->idProveedor,
            'FechaVencimiento' => $this->FechaVencimiento,
            'Precio' => $this->Precio,
            'Stock' => $this->Stock,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
