<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PacienteObraSocial;

/**
 * PacienteObraSocialSearch represents the model behind the search form about `app\models\PacienteObraSocial`.
 */
class PacienteObraSocialSearch extends PacienteObraSocial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idPaciente', 'idObraSocial'], 'integer'],
            [['NroAfiliado'], 'safe'],
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
        $query = PacienteObraSocial::find();

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
            'id' => $this->id,
            'idPaciente' => $this->idPaciente,
            'idObraSocial' => $this->idObraSocial,
        ]);

        $query->andFilterWhere(['like', 'NroAfiliado', $this->NroAfiliado]);

        return $dataProvider;
    }
}
