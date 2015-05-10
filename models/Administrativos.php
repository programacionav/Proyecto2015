<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrativos".
 *
 * @property integer $idEmpleado
 * @property integer $idSector
 *
 * @property Sectores $idSector0
 * @property Empleados $idEmpleado0
 * @property Partesalida[] $partesalidas
 */
class Administrativos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrativos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpleado', 'idSector'], 'required'],
            [['idEmpleado', 'idSector'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmpleado' => Yii::t('app', 'Id Empleado'),
            'idSector' => Yii::t('app', 'Id Sector'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSector0()
    {
        return $this->hasOne(Sectores::className(), ['idSector' => 'idSector']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
    
    public function getIdEmpleado()
    {
        return $this->idEmpleado0->idEmpleado;
    }
    public function getApellido()
    {
        return $this->idEmpleado0->Apellido;
    }
    public function getDNI()
    {
        return $this->idEmpleado0->DNI;
    }
    public function getNombre()
    {
        return $this->idEmpleado0->Nombre;
    }
    public function getNroEmpleado()
    {
        return $this->idEmpleado0->NroEmpleado;
    }
    public function getFechaIngreso()
    {
        return $this->idEmpleado0->FechaIngreso;
    }
    public function getEmail()
    {
        return $this->idEmpleado0->Email;
    }
    public function getActivo()
    {
        return $this->idEmpleado0->Activo;
    }
    public function getFechaBaja()
    {
        return $this->idEmpleado0->FechaBaja;
    }
    
    public function getSecDescripcion()
    {
        return $this->idEmpleado0->Descripcion;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartesalidas()
    {
        return $this->hasMany(Partesalida::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
