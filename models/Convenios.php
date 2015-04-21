<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convenios".
 *
 * @property integer $idConvenio
 * @property integer $idObraSocial
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property string $ValorConsulta
 * @property string $ValorPractica
 *
 * @property Obrassociales $idObraSocial0
 */
class Convenios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'convenios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idObraSocial', 'FechaInicio', 'FechaFin', 'ValorConsulta', 'ValorPractica'], 'required'],
            [['idObraSocial'], 'integer'],
            [['FechaInicio', 'FechaFin'], 'safe'],
            [['ValorConsulta', 'ValorPractica'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConvenio' => Yii::t('app', 'Id Convenio'),
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'FechaInicio' => Yii::t('app', 'Fecha Inicio'),
            'FechaFin' => Yii::t('app', 'Fecha Fin'),
            'ValorConsulta' => Yii::t('app', 'Valor Consulta'),
            'ValorPractica' => Yii::t('app', 'Valor Practica'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObraSocial0()
    {
        return $this->hasOne(Obrassociales::className(), ['idObraSocial' => 'idObraSocial']);
    }
}
