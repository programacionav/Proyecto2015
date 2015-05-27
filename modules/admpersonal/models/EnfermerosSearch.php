<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enfermeros;

/**
 * EnfermerosSearch represents the model behind the search form about `app\models\Enfermeros`.
 */
class EnfermerosSearch extends Enfermeros
{
    /**
     * @inheritdoc
     */
    
    //Empleado
    public $idEmpleado;
    public $Apellido;
    public $Nombre;
    public $DNI;
    public $NroEmpleado;
    public $FechaIngreso;
    public $Email;
    public $Activo;
    public $FechaBaja;
    
    //Especialidad
    public $Descripcion;
    public $idEspecialidad;
    
    
    
    public function rules()
    {
        return [
            [['idEnfermero', 'idEspecialidad'], 'integer'],
            [['idEmpleado','Apellido', "Nombre", "DNI", "NroEmpleado", "FechaIngreso", "Email", "Activo", "FechaBaja", "idEspecialidad", "Descripcion"], 'safe']
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
        $query = Enfermeros::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        // Ordenar valores.
        $dataProvider->setSort([
            'attributes'=>[
                'Nombre'=>['asc'=>['Nombre'=>SORT_ASC],
        		'desc'=>['Nombre'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'Apellido'=>['asc'=>['Apellido'=>SORT_ASC],
        		'desc'=>['Apellido'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'FechaIngreso'=>['asc'=>['FechaIngreso'=>SORT_ASC],
        		'desc'=>['FechaIngreso'=>SORT_DESC],
        		'default'=>SORT_DESC],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->joinWith(['idEnfermero0']);
            $query->joinWith(['idEspecialidad0']);
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idEnfermero' => $this->idEnfermero,
            'idEspecialidad' => $this->idEspecialidad,
        ]);
        
        $query->joinWith(['idEnfermero0'=>function ($q){
        	$q->where('empleados.Activo = 1');
        }
        ]);
        

        return $dataProvider;
    }
}
