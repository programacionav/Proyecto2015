<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Localidades;

/**
 * LocalidadesSearch represents the model behind the search form about `app\models\Localidades`.
 */
class LocalidadesSearch extends Localidades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLocalidad', 'idProvincia'], 'integer'],
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
        $query = Localidades::find();

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
            'idLocalidad' => $this->idLocalidad,
            'idProvincia' => $this->idProvincia,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
