<?php

namespace app\modules\admambulancias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Revisionestecnicas;

/**
 * RevisionestecnicasSearch represents the model behind the search form about `app\models\Revisionestecnicas`.
 */
class RevisionestecnicasSearch extends Revisionestecnicas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRevision'], 'integer'],
            [['Patente', 'Taller', 'FechaCarga', 'FechaVigencia', 'Observaciones'], 'safe'],
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
        $query = Revisionestecnicas::find();

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
            'idRevision' => $this->idRevision,
            'FechaCarga' => $this->FechaCarga,
            'FechaVigencia' => $this->FechaVigencia,
        ]);

        $query->andFilterWhere(['like', 'Patente', $this->Patente])
            ->andFilterWhere(['like', 'Taller', $this->Taller])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
}
