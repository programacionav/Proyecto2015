<?php

namespace app\modules\admobrasociales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Obrassociales;

/**
 * ObrassocialesSearch represents the model behind the search form about `app\models\Obrassociales`.
 */
class ObrassocialesSearch extends Obrassociales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idObraSocial'], 'integer'],
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
        $query = Obrassociales::find();

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
            'idObraSocial' => $this->idObraSocial,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
