<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capacitacionesdoctores".
 *
 * @property integer $idCD
 * @property integer $idDoctor
 * @property integer $idCapacitacion
 * @property string $Resultado
 *
 * @property Capacitaciones $idCapacitacion0
 * @property Doctores $idDoctor0
 */
class CapacitacionesDoctores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capacitacionesdoctores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCD', 'idDoctor', 'idCapacitacion', 'Resultado'], 'required'],
            [['idCD', 'idDoctor', 'idCapacitacion'], 'integer'],
            [['Resultado'], 'string', 'max' => 500],
            [['idDoctor', 'idCapacitacion'], 'unique', 'targetAttribute' => ['idDoctor', 'idCapacitacion'], 'message' => 'The combination of Id Doctor and Id Capacitacion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCD' => 'Id Cd',
            'idDoctor' => 'Doctor',
            'idCapacitacion' => 'Capacitacion',
            'Resultado' => 'Resultado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCapacitacion0()
    {
        return $this->hasOne(Capacitaciones::className(), ['idCapacitacion' => 'idCapacitacion']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleados0()
    {
    	return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idDoctor']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor0()
    {
        return $this->hasOne(Doctores::className(), ['idDoctor' => 'idDoctor']);
    }
}
