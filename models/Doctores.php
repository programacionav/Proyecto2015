<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctores".
 *
 * @property integer $idDoctor
 * @property integer $idEspecialidad
 * @property string $Matricula
 *
 * @property Capacitacionesdoctores[] $capacitacionesdoctores
 * @property Consultas[] $consultas
 * @property Empleados $idDoctor0
 * @property Especialidades $idEspecialidad0
 * @property Horariosatencion[] $horariosatencions
 * @property Internaciones[] $internaciones
 * @property Practicasmedicas[] $practicasmedicas
 * @property Turnos[] $turnos
 * @property Visitasinternaciones[] $visitasinternaciones
 */
class Doctores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDoctor', 'idEspecialidad', 'Matricula'], 'required'],
            [['idDoctor', 'idEspecialidad'], 'integer'],
            [['Matricula'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDoctor' => Yii::t('app', 'Id Doctor'),
            'idEspecialidad' => Yii::t('app', 'Id Especialidad'),
            'Matricula' => Yii::t('app', 'Matricula'),
            'espDescripcion' => Yii::t('app', 'Especialidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacitacionesdoctores()
    {
        return $this->hasMany(Capacitacionesdoctores::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consultas::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idDoctor']);
    }
    
    public function getIdEmpleado()
    {
        return $this->idDoctor0->idEmpleado;
    }
    public function getApellido()
    {
        return $this->idDoctor0->Apellido;
    }
    public function getDNI()
    {
        return $this->idDoctor0->DNI;
    }
    public function getNombre()
    {
        return $this->idDoctor0->Nombre;
    }
    public function getNroEmpleado()
    {
        return $this->idDoctor0->NroEmpleado;
    }
    public function getFechaIngreso()
    {
        return $this->idDoctor0->FechaIngreso;
    }
    public function getEmail()
    {
        return $this->idDoctor0->Email;
    }
    public function getActivo()
    {
        return $this->idDoctor0->Activo;
    }
    public function getFechaBaja()
    {
        return $this->idDoctor0->FechaBaja;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidad0()
    {
        return $this->hasOne(Especialidades::className(), ['idEspecialidad' => 'idEspecialidad']);
    }
    public function getEspDescripcion()
    {
        return $this->idEspecialidad0->Descripcion;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorariosatencions()
    {
        return $this->hasMany(Horariosatencion::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternaciones()
    {
        return $this->hasMany(Internaciones::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracticasmedicas()
    {
        return $this->hasMany(Practicasmedicas::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitasinternaciones()
    {
        return $this->hasMany(Visitasinternaciones::className(), ['idDoctor' => 'idDoctor']);
    }
}
