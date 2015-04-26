<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Administrativos;

/**
 * AdministrativosSearch represents the model behind the search form about `app\models\Administrativos`.
 */
class AdministrativosSearch extends Administrativos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpleado', 'idSector'], 'integer'],
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
        $query = Administrativos::find();

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
            'idEmpleado' => $this->idEmpleado,
            'idSector' => $this->idSector,
        ]);

        return $dataProvider;
    }
}
