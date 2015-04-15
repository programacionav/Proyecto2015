<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partesalida".
 *
 * @property integer $idParte
 * @property integer $Fecha
 * @property integer $idEmpleado
 *
 * @property Itemspartesalida[] $itemspartesalidas
 * @property Administrativos $idEmpleado0
 */
class ParteSalida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partesalida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'idEmpleado'], 'required'],
            [['Fecha', 'idEmpleado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idParte' => 'Id Parte',
            'Fecha' => 'Fecha',
            'idEmpleado' => 'Id Empleado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemspartesalidas()
    {
        return $this->hasMany(Itemspartesalida::className(), ['idParte' => 'idParte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Administrativos::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
