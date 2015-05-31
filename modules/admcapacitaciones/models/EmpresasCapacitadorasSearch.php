<?php

namespace app\modules\admcapacitaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpresasCapacitadoras;

/**
 * EmpresasCapacitadorasSearch represents the model behind the search form about `app\models\EmpresasCapacitadoras`.
 */
class EmpresasCapacitadorasSearch extends EmpresasCapacitadoras
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'integer'],
            [['Cuit', 'RazonSocial', 'Direccion', 'Telefono'], 'safe'],
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
        $query = EmpresasCapacitadoras::find();

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
        	'ECActivo' => 1,
            'idEmpresa' => $this->idEmpresa,
        ]);

        $query->andFilterWhere(['like', 'Cuit', $this->Cuit])
            ->andFilterWhere(['like', 'RazonSocial', $this->RazonSocial])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono]);

        return $dataProvider;
    }
}
