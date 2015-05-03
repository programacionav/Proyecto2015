<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consultas;

/**
 * ConsultasSearch represents the model behind the search form about `app\models\Consultas`.
 */
class ConsultasSearch extends Consultas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idConsulta', 'idDoctor', 'idPaciente', 'idObraSocial'], 'integer'],
            [['FechaHora', 'Diagnostico', 'Tratamiento'], 'safe'],
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

    public function searchConsPac($idPaciente,$fechaIn,$fechaFin){
        $table = new Consultas();
       
        $query = "Select * from consultas  WHERE idPaciente=$idPaciente and FechaHora BETWEEN '$fechaIn' AND '$fechaFin '";
       
        $model = $table ->findBySql($query)->all();  
        return $model;
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
        $query = Consultas::find();

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
            'idConsulta' => $this->idConsulta,
            'FechaHora' => $this->FechaHora,
            'idDoctor' => $this->idDoctor,
            'idPaciente' => $this->idPaciente,
            'idObraSocial' => $this->idObraSocial,
        ]);

        $query->andFilterWhere(['like', 'Diagnostico', $this->Diagnostico])
            ->andFilterWhere(['like', 'Tratamiento', $this->Tratamiento]);

        return $dataProvider;
    }
}
