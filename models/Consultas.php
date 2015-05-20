<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property integer $idConsulta
 * @property string $FechaHora
 * @property integer $idDoctor
 * @property integer $idPaciente
 * @property string $Diagnostico
 * @property string $Tratamiento
 * @property integer $idObraSocial
 *
 * @property Pacientes $idPaciente0
 * @property Obrassociales $idObraSocial0
 * @property Doctores $idDoctor0
 */
class Consultas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FechaHora', 'idDoctor', 'idPaciente', 'Diagnostico', 'Tratamiento'], 'required'],
            [['FechaHora'], 'safe'],
            [['idDoctor', 'idPaciente', 'idObraSocial'], 'integer'],
            [['Diagnostico', 'Tratamiento'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConsulta' => Yii::t('app', 'Id Consulta'),
            'FechaHora' => Yii::t('app', 'Fecha Hora'),
            'idDoctor' => Yii::t('app', 'Id Doctor'),
            'idPaciente' => Yii::t('app', 'Id Paciente'),
            'Diagnostico' => Yii::t('app', 'Diagnostico'),
            'Tratamiento' => Yii::t('app', 'Tratamiento'),
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
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
    public function getIdObraSocial0()
    {
        return $this->hasOne(Obrassociales::className(), ['idObraSocial' => 'idObraSocial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor0()
    {
        return $this->hasOne(Doctores::className(), ['idDoctor' => 'idDoctor']);
    }
    
}
