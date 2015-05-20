<?php

namespace app\modules\admambulancias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Segurosambulancias;

/**
 * SegurosambulanciasSearch represents the model behind the search form about `app\models\Segurosambulancias`.
 */
class SegurosambulanciasSearch extends Segurosambulancias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idseguro'], 'integer'],
            [['Patente', 'NroPoliza', 'Aseguradora', 'FechaDesde', 'FechaHasta'], 'safe'],
            [['ValorMensual'], 'number'],
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
        $query = Segurosambulancias::find();

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
            'idseguro' => $this->idseguro,
            'FechaDesde' => $this->FechaDesde,
            'FechaHasta' => $this->FechaHasta,
            'ValorMensual' => $this->ValorMensual,
        ]);

        $query->andFilterWhere(['like', 'Patente', $this->Patente])
            ->andFilterWhere(['like', 'NroPoliza', $this->NroPoliza])
            ->andFilterWhere(['like', 'Aseguradora', $this->Aseguradora]);

        return $dataProvider;
    }
}
