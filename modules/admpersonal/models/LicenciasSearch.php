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
    
    //TipoLicencia
    public $licDescripcion;
    public $idTipoLicencia;
    public $AntiguedadMinima;
    public $fechaInicio;
    public $fechaFin;
    
    //EstadoLicencia
    public $idEstado;
    public $estDescripcion;
    
    public function rules()
    {
        return [
            [['idLicencia', 'idTipoLicencia', 'idEmpleado', 'idEstado'], 'integer'],
            [['FechaInicio', 'FechaFin','idEmpleado','Nombre', 'Apellido', 'NroEmpleado', 'licDescripcion', 'FechaInicio', 'fechaFin', 'idEstado', 'estDescripcion'], 'safe'],
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
        
        /*$dataProvider->setSort([
            'attributes'=>[
                'Nombre'=>['asc'=>['empleados.Nombre'=>SORT_ASC],
        		'desc'=>['empleados.Nombre'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'Apellido'=>['asc'=>['Apellido'=>SORT_ASC],
        		'desc'=>['Apellido'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'FechaInicio'=>['asc'=>['FechaInicio'=>SORT_ASC],
        		'desc'=>['FechaInicio'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'FechaFin'=>['asc'=>['FechaFin'=>SORT_ASC],
        		'desc'=>['FechaFin'=>SORT_DESC],
        		'default'=>SORT_DESC]
                ]]);*/
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['idTipoLicencia0']);
            $query->joinWith(['idEmpleado0']);
            $query->joinWith(['idEstado0']);
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
    
    public function searchPendientes($params)
    {
        $query = Licencias::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['idTipoLicencia0']);
            $query->joinWith(['idEmpleado0']);
            $query->joinWith(['idEstado0']);
            return $dataProvider;
        }
        
        

        $query->andFilterWhere([
            'idLicencia' => $this->idLicencia,
            'idTipoLicencia' => $this->idTipoLicencia,
            'idEmpleado' => $this->idEmpleado,
            'FechaInicio' => $this->FechaInicio,
            'FechaFin' => $this->FechaFin,
            'idEstado' => "3",
        ]);

        return $dataProvider;
    }
}
