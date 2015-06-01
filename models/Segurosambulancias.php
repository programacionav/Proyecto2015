<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

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
            'vencimiento'=>Yii::t('app', 'Estado'),
            'dias'=>Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatente()
    {
        return $this->hasOne(Ambulancias::className(), ['Patente' => 'Patente']);
    }
    
    public function getVencimiento()
    {
        if ((yii::$app->user->identity['idRol']) == 1) {
        $tempId = $this->idseguro; 
                    
                    $diferenciaDias=  $this->getDias();
                    if ($diferenciaDias<=15) {//Modificar URL para enviar mail
                        if ($diferenciaDias < 0) {
                            $sale =  Html::a('Dar aviso!<br>Vencio hace ' . ($diferenciaDias* -1) . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-danger', 'onclick' => 'actionAviso(' . $tempId . ')']);
                        } else {
                            $sale = Html::a('Dar aviso!<br>Aun quedan ' . $diferenciaDias . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-warning', 'onclick' => 'actionAviso(' . $tempId . ')']);
                        }
                    } else {
                        $sale = Html::a('Vigente<br>Aun quedan ' . $diferenciaDias . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-primary disabled']);
                    }
        }
        else {
              $sale = Html::a('Dar aviso!<br>De Vencimiento', ['create'], ['class' => 'btn btn-default disabled']);
        }
                    return $sale;
                
    }
    public function getDias() {
        

                    date_default_timezone_set('America/Argentina/Buenos_Aires');

                    $fechaVigencia = $this->FechaHasta;
                    //Fecha de vigencia seccionada
                    $diaVigencia = $fechaVigencia[8] . $fechaVigencia[9];
                    $mesVigencia = $fechaVigencia[5] . $fechaVigencia[6];
                    $anioVigencia = $fechaVigencia[0] . $fechaVigencia[1] . $fechaVigencia[2] . $fechaVigencia[3];

                    $datevigencia = date_create($anioVigencia . '-' . $mesVigencia . '-' . $diaVigencia);
 
                    $dateactual = new \DateTime('now');
                    $diferenciaDias = (date_diff($dateactual, $datevigencia)->format('%R%a'))* -1 *-1;
                    return $diferenciaDias;
    }
}
