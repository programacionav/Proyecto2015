<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "practicasmedicas".
 *
 * @property integer $idPractica
 * @property integer $idTipoPractica
 * @property string $FechaSolicitud
 * @property string $FechaHoraRealizado
 * @property integer $idDoctor
 * @property integer $idPaciente
 * @property string $Resultado
 * @property integer $idObraSocial
 * @property string $Adjunto
 */
class PracticasMedicas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $file;
    
    public static function tableName()
    {
        return 'practicasmedicas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoPractica', 'FechaSolicitud', 'FechaHoraRealizado', 'idDoctor', 'idPaciente', 'Resultado'], 'required'],
            [['idTipoPractica', 'idDoctor', 'idPaciente', 'idObraSocial'], 'integer'],
            [['FechaSolicitud', 'FechaHoraRealizado'], 'safe'],
            [['Resultado'], 'string'],
            [['Adjunto'], 'string', 'max' => 250],
            [['file'],'file',
                
                'tooBig' => 'El tamaño maximo permitido es 10Mb',
                'minSize'=>10,
                'tooSmall'=>'El tamaño minimo permitido es 10 bytes',
                'extensions'=>'pdf,txt,doc',
                'wrongExtension'=>'El archivo {file} no contiene una extensión permitida {extensions}',
                
            ]
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPractica' => Yii::t('app', 'Id Practica'),
            'idTipoPractica' => Yii::t('app', 'Id Tipo Practica'),
            'FechaSolicitud' => Yii::t('app', 'Fecha Solicitud'),
            'FechaHoraRealizado' => Yii::t('app', 'Fecha Hora Realizado'),
            'idDoctor' => Yii::t('app', 'Id Doctor'),
            'idPaciente' => Yii::t('app', 'Id Paciente'),
            'Resultado' => Yii::t('app', 'Resultado'),
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'Adjunto' => Yii::t('app', 'Adjunto'),
            'file'=>'Seleccionar archivos:',
        ];
    }
    
    public function getTiposPracticas() {
        
        return $this->hasOne(TiposPracticas::className(),['idTipoPractica'=>'idTipoPractica']);
    }
    
    public function getDescripcion() {
        
        return $this->tiposPracticas->Descripcion;
    }
    
}