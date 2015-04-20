<?php

namespace app\modules\admcapacitaciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Capacitadores;

/**
 * CapacitadoresSearch represents the model behind the search form about `app\models\Capacitadores`.
 */
class CapacitadoresSearch extends Capacitadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCapacitador', 'idEmpresaCapacitadora', 'idEspecialidad'], 'integer'],
            [['Apellido', 'Nombre'], 'safe'],
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
        $query = Capacitadores::find();

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
            'idCapacitador' => $this->idCapacitador,
            'idEmpresaCapacitadora' => $this->idEmpresaCapacitadora,
            'idEspecialidad' => $this->idEspecialidad,
        ]);

        $query->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
