<?php

namespace app\modules\admfarmacia;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemsPedidoCompra;

/**
 * ItemsPedidoCompraSearch represents the model behind the search form about `app\models\ItemsPedidoCompra`.
 */
class ItemsPedidoCompraSearch extends ItemsPedidoCompra
{
	public $Descripcion;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idItem', 'idPedido', 'idInsumo', 'Cantidad'], 'integer'],
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
        $query = ItemsPedidoCompra::find();

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
            'idPedido' => $this->idPedido,
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
