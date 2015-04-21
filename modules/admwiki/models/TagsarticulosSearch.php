<?php

namespace app\modules\admwiki\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tagsarticulos;

/**
 * TagsarticulosSearch represents the model behind the search form about `app\models\Tagsarticulos`.
 */
class TagsarticulosSearch extends Tagsarticulos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idArticulo', 'idTag'], 'integer'],
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
        $query = Tagsarticulos::find();

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
            'idArticulo' => $this->idArticulo,
            'idTag' => $this->idTag,
        ]);

        return $dataProvider;
    }
}
