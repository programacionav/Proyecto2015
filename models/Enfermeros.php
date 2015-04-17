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
            'idEnfermero' => Yii::t('app', 'Id Enfermero'),
            'idEspecialidad' => Yii::t('app', 'Id Especialidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEnfermero0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEnfermero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidad0()
    {
        return $this->hasOne(Especialidades::className(), ['idEspecialidad' => 'idEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicacionsuministradas()
    {
        return $this->hasMany(Medicacionsuministrada::className(), ['idEnfermero' => 'idEnfermero']);
    }
}
