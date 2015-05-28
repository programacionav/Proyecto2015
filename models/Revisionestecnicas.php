<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "revisionestecnicas".
 *
 * @property integer $idRevision
 * @property string $Patente
 * @property string $Taller
 * @property string $FechaCarga
 * @property string $FechaVigencia
 * @property string $Observaciones
 *
 * @property Ambulancias $patente
 */
class Revisionestecnicas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisionestecnicas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Patente', 'Taller', 'FechaCarga', 'FechaVigencia'], 'required'],
            [['FechaCarga', 'FechaVigencia'], 'safe'],
            [['Observaciones'], 'string'],
            [['Patente'], 'string', 'max' => 6],
            [['Taller'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRevision' => 'Id Revision',
            'Patente' => 'Patente',
            'Taller' => 'Taller',
            'FechaCarga' => 'Fecha Carga',
            'FechaVigencia' => 'Fecha Vigencia',
            'Observaciones' => 'Observaciones',
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
        $tempId = $this->idRevision; 
                    
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

                    $fechaVigencia = $this->FechaVigencia;
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
