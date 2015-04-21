<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visitasinternaciones".
 *
 * @property integer $idVisita
 * @property integer $idInternacion
 * @property integer $FechaHora
 * @property integer $idDoctor
 * @property string $EstadoPaciente
 * @property string $Observaciones
 *
 * @property Internaciones $idInternacion0
 * @property Doctores $idDoctor0
 */
class Visitasinternaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitasinternaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInternacion', 'FechaHora', 'idDoctor', 'EstadoPaciente'], 'required'],
            [['idInternacion', 'FechaHora', 'idDoctor'], 'integer'],
            [['EstadoPaciente', 'Observaciones'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVisita' => 'Id Visita',
            'idInternacion' => 'Id Internacion',
            'FechaHora' => 'Fecha Hora',
            'idDoctor' => 'Id Doctor',
            'EstadoPaciente' => 'Estado Paciente',
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
    public function getIdDoctor0()
    {
        return $this->hasOne(Doctores::className(), ['idDoctor' => 'idDoctor']);
    }
}
