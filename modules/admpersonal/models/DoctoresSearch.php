<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctores;

/**
 * DoctoresSearch represents the model behind the search form about `app\models\Doctores`.
 */
class DoctoresSearch extends Doctores
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
            [['idDoctor', 'idEspecialidad'], 'integer'],
            [['Matricula', 'idEmpleado','Apellido', "Nombre", "DNI", "NroEmpleado", "FechaIngreso", "Email", "Activo", "FechaBaja", "idEspecialidad", "Descripcion"], 'safe'],
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
        $query = Doctores::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->joinWith(['idDoctor0']);
            $query->joinWith(['idEspecialidad0']);
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idDoctor' => $this->idDoctor,
            'idEspecialidad' => $this->idEspecialidad,
        ]);

        $query->andFilterWhere(['like', 'Matricula', $this->Matricula]);

        return $dataProvider;
    }
}
