<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liquidacionesobrasocial".
 *
 * @property integer $idLiquidacion
 * @property integer $idObraSocial
 * @property integer $Mes
 * @property integer $Anio
 * @property string $FechaGeneracion
 * @property string $TotalPagar
 * @property integer $Pagada
 * @property string $FechaPago
 *
 * @property Obrassociales $idObraSocial0
 */
class Liquidacionesobrasocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liquidacionesobrasocial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idObraSocial', 'Mes', 'Anio', 'FechaGeneracion', 'TotalPagar'], 'required'],
            [['idObraSocial', 'Mes', 'Anio', 'Pagada'], 'integer'],
            [['FechaGeneracion', 'FechaPago'], 'safe'],
            [['TotalPagar'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLiquidacion' => Yii::t('app', 'Id Liquidacion'),
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'Mes' => Yii::t('app', 'Mes'),
            'Anio' => Yii::t('app', 'Anio'),
            'FechaGeneracion' => Yii::t('app', 'Fecha Generacion'),
            'TotalPagar' => Yii::t('app', 'Total Pagar'),
            'Pagada' => Yii::t('app', 'Pagada'),
            'FechaPago' => Yii::t('app', 'Fecha Pago'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObraSocial0()
    {
        return $this->hasOne(Obrassociales::className(), ['idObraSocial' => 'idObraSocial']);
    }
    public function getDescripcion(){
    	return $this->idObraSocial0->Descripcion;
    }
}
