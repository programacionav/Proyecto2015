<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Licencias;

/**
 * LicenciasSearch represents the model behind the search form about `app\models\Licencias`.
 */
class LicenciasSearch extends Licencias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLicencia', 'idTipoLicencia', 'idEmpleado', 'idEstado'], 'integer'],
            [['FechaInicio', 'FechaFin'], 'safe'],
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
        $query = Licencias::find();

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
            'idLicencia' => $this->idLicencia,
            'idTipoLicencia' => $this->idTipoLicencia,
            'idEmpleado' => $this->idEmpleado,
            'FechaInicio' => $this->FechaInicio,
            'FechaFin' => $this->FechaFin,
            'idEstado' => $this->idEstado,
        ]);

        return $dataProvider;
    }
}
