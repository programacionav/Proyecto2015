<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obrassociales".
 *
 * @property integer $idObraSocial
 * @property string $Descripcion
 *
 * @property Consultas[] $consultas
 * @property Convenios[] $convenios
 * @property Liquidacionesobrasocial[] $liquidacionesobrasocials
 * @property Pacienteobrasocial[] $pacienteobrasocials
 * @property Turnos[] $turnos
 */
class Obrassociales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obrassociales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consultas::className(), ['idObraSocial' => 'idObraSocial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenios::className(), ['idObraSocial' => 'idObraSocial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiquidacionesobrasocials()
    {
        return $this->hasMany(Liquidacionesobrasocial::className(), ['idObraSocial' => 'idObraSocial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteobrasocials()
    {
        return $this->hasMany(Pacienteobrasocial::className(), ['idObraSocial' => 'idObraSocial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['idObraSocial' => 'idObraSocial']);
    }
}
