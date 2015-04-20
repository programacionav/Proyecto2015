<?php

namespace app\modules\admcapacitaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CapacitacionesDoctores;

/**
 * CapacitacionesDoctoresSearch represents the model behind the search form about `app\models\CapacitacionesDoctores`.
 */
class CapacitacionesDoctoresSearch extends CapacitacionesDoctores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCD', 'idDoctor', 'idCapacitacion'], 'integer'],
            [['Resultado'], 'safe'],
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
        $query = CapacitacionesDoctores::find();

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
            'idCD' => $this->idCD,
            'idDoctor' => $this->idDoctor,
            'idCapacitacion' => $this->idCapacitacion,
        ]);

        $query->andFilterWhere(['like', 'Resultado', $this->Resultado]);

        return $dataProvider;
    }
}
