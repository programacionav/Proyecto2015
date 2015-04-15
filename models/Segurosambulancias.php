<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "segurosambulancias".
 *
 * @property integer $idseguro
 * @property string $Patente
 * @property string $NroPoliza
 * @property string $Aseguradora
 * @property string $FechaDesde
 * @property string $FechaHasta
 * @property string $ValorMensual
 *
 * @property Ambulancias $patente
 */
class Segurosambulancias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'segurosambulancias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Patente', 'NroPoliza', 'Aseguradora', 'FechaDesde', 'FechaHasta', 'ValorMensual'], 'required'],
            [['FechaDesde', 'FechaHasta'], 'safe'],
            [['ValorMensual'], 'number'],
            [['Patente'], 'string', 'max' => 6],
            [['NroPoliza'], 'string', 'max' => 20],
            [['Aseguradora'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idseguro' => 'Idseguro',
            'Patente' => 'Patente',
            'NroPoliza' => 'Nro Poliza',
            'Aseguradora' => 'Aseguradora',
            'FechaDesde' => 'Fecha Desde',
            'FechaHasta' => 'Fecha Hasta',
            'ValorMensual' => 'Valor Mensual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatente()
    {
        return $this->hasOne(Ambulancias::className(), ['Patente' => 'Patente']);
    }
}
