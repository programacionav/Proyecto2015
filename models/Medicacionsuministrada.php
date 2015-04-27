<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicacionsuministrada".
 *
 * @property integer $idMedicacion
 * @property string $FechaHora
 * @property integer $idInternacion
 * @property integer $idEnfermero
 * @property string $Medicacion
 * @property string $Dosis
 * @property string $Observaciones
 *
 * @property Internaciones $idInternacion0
 * @property Enfermeros $idEnfermero0
 */
class Medicacionsuministrada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicacionsuministrada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FechaHora', 'idInternacion', 'idEnfermero', 'Medicacion', 'Dosis'], 'required'],
            [['FechaHora'], 'safe'],
            [['idInternacion', 'idEnfermero'], 'integer'],
            [['Observaciones'], 'string'],
            [['Medicacion'], 'string', 'max' => 150],
            [['Dosis'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMedicacion' => 'Id Medicacion',
            'FechaHora' => 'Fecha Hora',
            'idInternacion' => 'Id Internacion',
            'idEnfermero' => 'Id Enfermero',
            'Medicacion' => 'Medicacion',
            'Dosis' => 'Dosis',
            'Observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInternacion0()
    {
        return $this->hasOne(Internaciones::className(), ['idInternacion' => 'idInternacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEnfermero0()
    {
        return $this->hasOne(Enfermeros::className(), ['idEnfermero' => 'idEnfermero']);
    }
}
