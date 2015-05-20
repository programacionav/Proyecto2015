<?php

namespace app\modules\admcomedor\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservas;

/**
 * ReservasSearch represents the model behind the search form about `app\models\Reservas`.
 */
class ReservasSearch extends Reservas
{
    /**
     * @inheritdoc
     */
	public $NombreEmpleado;
	
    public function rules()
    {
        return [
            [['idReserva', 'idMenu', 'idEmpleado', 'Retiro'], 'integer'],
            [['Fecha', 'Observaciones', 'NombreEmpleado'], 'safe'],
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
        $query = Reservas::find();

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
            'idReserva' => $this->idReserva,
            'Fecha' => $this->Fecha,
            'idMenu' => $this->idMenu,
            'idEmpleado' => $this->idEmpleado,
            'Retiro' => $this->Retiro,
        ]);

        $query->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
}
