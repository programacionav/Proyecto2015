<?php

namespace app\modules\admambulancias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ambulancias;

/**
 * AmbulanciasSearch represents the model behind the search form about `app\models\Ambulancias`.
 */
class AmbulanciasSearch extends Ambulancias
{
    /**
     * @inheritdoc
     */
    public $FullNombre;
    public function rules()
    {
        return [
            [['Patente', 'Marca', 'Modelo','FullNombre'], 'safe'],
            [['NroMotor', 'idEmpleado'], 'integer'],
           
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
        $query = Ambulancias::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        
        
        
        /*Para ordenar*/
        
        $this->load($params);
        $dataProvider->setSort([
        'attributes'=>[
            'Patente',
            'Marca',
            'Modelo',
            'NroMotor',
            'FullNombre'=>[
                'asc'=>['Nombre'=>SORT_ASC, 'Apellido'=>SORT_ASC],
                'desc'=>['Nombre'=>SORT_DESC, 'Apellido'=>SORT_DESC],
                'label'=>'Solo Nombre 2',
                'default'=>SORT_ASC
            ]
        ]
    ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('idEmpleado0');
            return $dataProvider;
        }
        

        $query->andFilterWhere([
            'NroMotor' => $this->NroMotor,
        ]);
        
        $query->joinWith(['idEmpleado0'=>  function ($q){
            $q->where("empleados.Nombre LIKE '%".$this->FullNombre."%'")
              ->orWhere("empleados.Apellido LIKE '%".$this->FullNombre."%'");
            
        }]);

        $query->andFilterWhere(['like', 'Patente', $this->Patente])
            ->andFilterWhere(['like', 'Marca', $this->Marca])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo]);
        $query->andFilterWhere([
            'idEmpleado' => $this->idEmpleado,
        ]);

        return $dataProvider;
    }
}
