<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pacientes".
 *
 * @property integer $idPaciente
 * @property string $Apellido
 * @property string $Nombre
 * @property integer $DNI
 * @property integer $idLocalidad
 * @property string $Direccion
 * @property string $FechaNac
 * @property string $FechaAlta
 * @property string $Email
 *
 * @property Consultas[] $consultas
 * @property Internaciones[] $internaciones
 * @property Pacienteobrasocial[] $pacienteobrasocials
 * @property Localidades $idLocalidad0
 * @property Practicasmedicas[] $practicasmedicas
 * @property Turnos[] $turnos
 */
class Pacientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pacientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apellido', 'Nombre', 'DNI', 'idLocalidad', 'Direccion', 'FechaNac', 'FechaAlta'], 'required'],
            [['DNI', 'idLocalidad'], 'integer'],
            [['FechaNac', 'FechaAlta'], 'safe'],
            [['Apellido', 'Nombre'], 'string', 'max' => 50],
            [['Direccion'], 'string', 'max' => 200],
            [['Email'], 'string', 'max' => 100],
            [['DNI'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaciente' => Yii::t('app', 'Id Paciente'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'DNI' => Yii::t('app', 'Dni'),
            'idLocalidad' => Yii::t('app', 'Id Localidad'),
            'Direccion' => Yii::t('app', 'Direccion'),
            'FechaNac' => Yii::t('app', 'Fecha Nac'),
            'FechaAlta' => Yii::t('app', 'Fecha Alta'),
            'Email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consultas::className(), ['idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternaciones()
    {
        return $this->hasMany(Internaciones::className(), ['idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteobrasocials()
    {
        return $this->hasMany(Pacienteobrasocial::className(), ['idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalidad0()
    {
        return $this->hasOne(Localidades::className(), ['idLocalidad' => 'idLocalidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracticasmedicas()
    {
        return $this->hasMany(Practicasmedicas::className(), ['idPaciente' => 'idPaciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['idPaciente' => 'idPaciente']);
    }
}
