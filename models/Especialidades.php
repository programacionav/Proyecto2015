<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "especialidades".
 *
 * @property integer $idEspecialidad
 * @property string $Descripcion
 *
 * @property Capacitadores[] $capacitadores
 * @property Doctores[] $doctores
 * @property Enfermeros[] $enfermeros
 */
class Especialidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEspecialidad' => Yii::t('app', 'Id Especialidad'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacitadores()
    {
        return $this->hasMany(Capacitadores::className(), ['idEspecialidad' => 'idEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctores()
    {
        return $this->hasMany(Doctores::className(), ['idEspecialidad' => 'idEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeros()
    {
        return $this->hasMany(Enfermeros::className(), ['idEspecialidad' => 'idEspecialidad']);
    }
    
}