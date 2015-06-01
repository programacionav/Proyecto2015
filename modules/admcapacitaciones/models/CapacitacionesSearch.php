<?php

namespace app\modules\admcapacitaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Capacitaciones;

/**
 * CapacitacionesSearch represents the model behind the search form about `app\models\Capacitaciones`.
 */
class CapacitacionesSearch extends Capacitaciones
{
	public $Desde;
	public $Hasta;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCapacitacion', 'DuracionHoras', 'idCapacitador'], 'integer'],
            [['Nombre', 'Descripcion', 'Fecha', 'Desde', 'Hasta'], 'safe'],
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
        $query = Capacitaciones::find();

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
        	'CapacitacionesActivo' => 1,
            'idCapacitacion' => $this->idCapacitacion,
            'DuracionHoras' => $this->DuracionHoras,
            'idCapacitador' => $this->idCapacitador,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);
		if(isset($this->Fecha))
		{
			$query->andFilterWhere(['like', 'Fecha', $this->Fecha]);
		}
		else
		{
			$query->andFilterWhere(['>', 'Fecha', $this->Desde])
			->andFilterWhere(['<', 'Fecha', $this->Hasta]);
		}
           

        return $dataProvider;
    }
}
