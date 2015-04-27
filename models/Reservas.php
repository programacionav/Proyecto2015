<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property integer $idReserva
 * @property integer $Fecha
 * @property integer $idMenu
 * @property integer $idEmpleado
 * @property integer $Retiro
 *
 * @property Menus $idMenu0
 * @property Empleados $idEmpleado0
 */
class Reservas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'idMenu', 'idEmpleado'], 'required'],
            [['Fecha', 'idMenu', 'idEmpleado', 'Retiro'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idReserva' => 'Id Reserva',
            'Fecha' => 'Fecha',
            'idMenu' => 'Menu',
            'idEmpleado' => 'Empleado',
            'Retiro' => 'Retiro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMenu0()
    {
        return $this->hasOne(Menus::className(), ['idMenu' => 'idMenu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
