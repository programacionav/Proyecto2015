<?php

namespace app\modules\admfarmacia;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PedidoCompra;

/**
 * PedidoCompraSearch represents the model behind the search form about `app\models\PedidoCompra`.
 */
class PedidoCompraSearch extends PedidoCompra
{
	
	public $RazonSocial;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'idProveedor'], 'required'],
            [['Fecha'], 'safe'],
            [['idProveedor'], 'integer'],
            [['RazonSocial'], 'safe']
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
        $query = PedidoCompra::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
        	$query->joinWith(['idProveedor0']);
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idPedido' => $this->idPedido,
            'Fecha' => $this->Fecha,
            'idProveedor' => $this->idProveedor,
        		]);
        $query->joinWith(['idProveedor0'=>function ($q){
        $q->where('proveedor.RazonSocial LIKE "%'.
        		   $this->RazonSocial . '%"');
        		}
        ]);

        return $dataProvider;
    }
}
