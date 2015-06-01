<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enfermeros".
 *
 * @property integer $idEnfermero
 * @property integer $idEspecialidad
 *
 * @property Empleados $idEnfermero0
 * @property Especialidades $idEspecialidad0
 * @property Medicacionsuministrada[] $medicacionsuministradas
 */
class Enfermeros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enfermeros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEnfermero', 'idEspecialidad'], 'required'],
            [['idEnfermero', 'idEspecialidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEnfermero' => Yii::t('app', 'ID Enfermero'),
            'idEspecialidad' => Yii::t('app', 'Especialidad'),
            'espDescripcion' => \Yii::t('app', 'Especialidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEnfermero0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEnfermero']);
    }
    
    public function getIdEmpleado()
    {
        return $this->idEnfermero0->idEmpleado;
    }
    public function getApellido()
    {
        return $this->idEnfermero0->Apellido;
    }
    public function getDNI()
    {
        return $this->idEnfermero0->DNI;
    }
    public function getNombre()
    {
        return $this->idEnfermero0->Nombre;
    }
    public function getNroEmpleado()
    {
        return $this->idEnfermero0->NroEmpleado;
    }
    public function getFechaIngreso()
    {
        return $this->idEnfermero0->FechaIngreso;
    }
    public function getEmail()
    {
        return $this->idEnfermero0->Email;
    }
    public function getActivo()
    {
        return $this->idEnfermero0->Activo;
    }
    public function getFechaBaja()
    {
        return $this->idEnfermero0->FechaBaja;
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
    public function getMedicacionsuministradas()
    {
        return $this->hasMany(Medicacionsuministrada::className(), ['idEnfermero' => 'idEnfermero']);
    }
}
