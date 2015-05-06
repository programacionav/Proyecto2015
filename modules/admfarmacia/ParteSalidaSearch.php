<?php

namespace app\modules\admfarmacia;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ParteSalida;

/**
 * ParteSalidaSearch represents the model behind the search form about `app\models\ParteSalida`.
 */
class ParteSalidaSearch extends ParteSalida
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idParte', 'idEmpleado'], 'integer'],
            [['Fecha'], 'safe'],
            
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
        $query = ParteSalida::find();

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
            'idParte' => $this->idParte,
            'Fecha' => $this->Fecha,
            'idEmpleado' => $this->idEmpleado,
        ]);

        return $dataProvider;
    }
}
