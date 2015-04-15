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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartesalidas()
    {
        return $this->hasMany(Partesalida::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
