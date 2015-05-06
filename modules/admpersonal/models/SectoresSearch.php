<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sectores;

/**
 * SectoresSearch represents the model behind the search form about `app\models\Sectores`.
 */
class SectoresSearch extends Sectores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSector'], 'integer'],
            [['Descripcion'], 'safe'],
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
        $query = Sectores::find();

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
            'idSector' => $this->idSector,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
