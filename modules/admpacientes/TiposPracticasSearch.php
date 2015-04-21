<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TiposPracticas;

/**
 * TiposPracticasSearch represents the model behind the search form about `app\models\TiposPracticas`.
 */
class TiposPracticasSearch extends TiposPracticas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoPractica'], 'integer'],
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
        $query = TiposPracticas::find();

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
            'idTipoPractica' => $this->idTipoPractica,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
