<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "licencias".
 *
 * @property integer $idLicencia
 * @property integer $idTipoLicencia
 * @property integer $idEmpleado
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property integer $idEstado
 *
 * @property Tiposlicencias $idTipoLicencia0
 * @property Empleados $idEmpleado0
 * @property Estadoslicencias $idEstado0
 */
class Licencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'licencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoLicencia', 'idEmpleado', 'FechaInicio', 'FechaFin', 'idEstado'], 'required'],
            [['idTipoLicencia', 'idEmpleado', 'idEstado'], 'integer'],
            [['FechaInicio', 'FechaFin', 'NroEmpleado', 'Nombre', 'Apellido', 'desTipoLicencia'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLicencia' => Yii::t('app', 'Id Licencia'),
            'idTipoLicencia' => Yii::t('app', 'Tipo Licencia'),
            'idEmpleado' => Yii::t('app', 'Id Empleado'),
            'FechaInicio' => Yii::t('app', 'Inicia'),
            'FechaFin' => Yii::t('app', 'Finaliza'),
            'idEstado' => Yii::t('app', 'Estado'),
            'desTipoLicencia' => Yii::t('app', 'Tipo'),
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoLicencia0()
    {
        return $this->hasOne(Tiposlicencias::className(), ['idTipoLicencia' => 'idTipoLicencia']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
    
    public function arrayLicencias()
    {
        return $this->findBySql("select * from licencias")->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estadoslicencias::className(), ['idEstado' => 'idEstado']);
    }
    
    public function getApellido()
    {
        return $this->idEmpleado0->Apellido;
    }
    
    public function getNombre()
    {
        return $this->idEmpleado0->Nombre;
    }
    public function getNroEmpleado()
    {
        return $this->idEmpleado0->NroEmpleado;
    }
    
    public function getDesTipoLicencia()
    {
        return $this->idTipoLicencia0->Descripcion;
    }
}
