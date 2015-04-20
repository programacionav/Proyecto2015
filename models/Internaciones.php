<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "internaciones".
 *
 * @property integer $idInternacion
 * @property integer $idPaciente
 * @property integer $idDoctor
 * @property string $NroHabitacion
 * @property string $FechaHoraIngreso
 * @property string $FechaHoraEgreso
 * @property string $Diagnostico
 * @property string $Observaciones
 *
 * @property Pacientes $idPaciente0
 * @property Doctores $idDoctor0
 * @property Medicacionsuministrada[] $medicacionsuministradas
 * @property Visitasinternaciones[] $visitasinternaciones
 */
class Internaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'internaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPaciente', 'idDoctor', 'NroHabitacion', 'FechaHoraIngreso', 'Diagnostico'], 'required'],
            [['idPaciente', 'idDoctor'], 'integer'],
            [['FechaHoraIngreso', 'FechaHoraEgreso'], 'safe'],
            [['Diagnostico', 'Observaciones'], 'string'],
            [['NroHabitacion'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInternacion' => 'Id Internacion',
            'idPaciente' => 'Id Paciente',
            'idDoctor' => 'Id Doctor',
            'NroHabitacion' => 'Nro Habitacion',
            'FechaHoraIngreso' => 'Fecha Hora Ingreso',
            'FechaHoraEgreso' => 'Fecha Hora Egreso',
            'Diagnostico' => 'Diagnostico',
            'Observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPaciente0()
    {
        return $this->hasOne(Pacientes::className(), ['idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor0()
    {
        return $this->hasOne(Doctores::className(), ['idDoctor' => 'idDoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicacionsuministradas()
    {
        return $this->hasMany(Medicacionsuministrada::className(), ['idInternacion' => 'idInternacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitasinternaciones()
    {
        return $this->hasMany(Visitasinternaciones::className(), ['idInternacion' => 'idInternacion']);
    }
}
