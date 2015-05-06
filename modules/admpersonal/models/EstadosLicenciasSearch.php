<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadosLicencias;

/**
 * EstadosLicenciasSearch represents the model behind the search form about `app\models\EstadosLicencias`.
 */
class EstadosLicenciasSearch extends EstadosLicencias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstado'], 'integer'],
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
        $query = EstadosLicencias::find();

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
            'idEstado' => $this->idEstado,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
