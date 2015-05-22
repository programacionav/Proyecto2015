<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ambulancias".
 *
 * @property string $Patente
 * @property string $Marca
 * @property string $Modelo
 * @property integer $NroMotor
 * @property integer $idEmpleado
 *
 * @property Empleados $idEmpleado0
 * @property Revisionestecnicas[] $revisionestecnicas
 * @property Segurosambulancias[] $segurosambulancias
 */
class Ambulancias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ambulancias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Patente', 'Marca', 'Modelo', 'NroMotor', 'idEmpleado'], 'required'],
            [['NroMotor', 'idEmpleado'], 'integer'],
            [['Patente'], 'string', 'max' => 6],
            [['Marca', 'Modelo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Patente' => 'Patente',
            'Marca' => 'Marca',
            'Modelo' => 'Modelo',
            'NroMotor' => 'Nro Motor',
            'idEmpleado' => 'Id Empleado',
            'FullNombre'=> Yii::t('app', 'Empleado Encargado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
  public function getFullNombre()
    {
        return $this->idEmpleado0->Nombre.' '.$this->idEmpleado0->Apellido;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisionestecnicas()
    {
        return $this->hasMany(Revisionestecnicas::className(), ['Patente' => 'Patente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegurosambulancias()
    {
        return $this->hasMany(Segurosambulancias::className(), ['Patente' => 'Patente']);
    }
}
