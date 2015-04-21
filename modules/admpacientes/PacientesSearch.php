<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pacientes;

/**
 * PacientesSearch represents the model behind the search form about `app\models\Pacientes`.
 */
class PacientesSearch extends Pacientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPaciente', 'DNI', 'idLocalidad'], 'integer'],
            [['Apellido', 'Nombre', 'Direccion', 'FechaNac', 'FechaAlta', 'Email'], 'safe'],
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
        $query = Pacientes::find();

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
            'idPaciente' => $this->idPaciente,
            'DNI' => $this->DNI,
            'idLocalidad' => $this->idLocalidad,
            'FechaNac' => $this->FechaNac,
            'FechaAlta' => $this->FechaAlta,
        ]);

        $query->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
