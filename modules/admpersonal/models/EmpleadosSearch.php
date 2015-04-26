<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleados;

/**
 * EmpleadosSearch represents the model behind the search form about `app\models\Empleados`.
 */
class EmpleadosSearch extends Empleados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpleado', 'DNI', 'NroEmpleado', 'Activo'], 'integer'],
            [['Apellido', 'Nombre', 'FechaIngreso', 'Email', 'FechaBaja'], 'safe'],
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
        $query = Empleados::find();

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
            'idEmpleado' => $this->idEmpleado,
            'DNI' => $this->DNI,
            'NroEmpleado' => $this->NroEmpleado,
            'FechaIngreso' => $this->FechaIngreso,
            'Activo' => $this->Activo,
            'FechaBaja' => $this->FechaBaja,
        ]);

        $query->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
