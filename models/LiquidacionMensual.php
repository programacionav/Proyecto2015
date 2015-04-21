<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liquidacionmensual".
 *
 * @property integer $idliquidacion
 * @property integer $Mes
 * @property integer $Anio
 * @property string $Total
 * @property integer $idEmpleado
 * @property integer $Pagada
 *
 * @property Empleados $idEmpleado0
 */
class LiquidacionMensual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liquidacionmensual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Mes', 'Anio', 'Total', 'idEmpleado'], 'required'],
            [['Mes', 'Anio', 'idEmpleado', 'Pagada'], 'integer'],
            [['Total'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idliquidacion' => 'Idliquidacion',
            'Mes' => 'Mes',
            'Anio' => 'Anio',
            'Total' => 'Total',
            'idEmpleado' => 'Id Empleado',
            'Pagada' => 'Pagada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
