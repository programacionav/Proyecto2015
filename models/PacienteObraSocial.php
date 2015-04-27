<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pacienteobrasocial".
 *
 * @property integer $id
 * @property integer $idPaciente
 * @property integer $idObraSocial
 * @property string $NroAfiliado
 */
class PacienteObraSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pacienteobrasocial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPaciente', 'idObraSocial', 'NroAfiliado'], 'required'],
            [['idPaciente', 'idObraSocial'], 'integer'],
            [['NroAfiliado'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idPaciente' => Yii::t('app', 'Id Paciente'),
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'NroAfiliado' => Yii::t('app', 'Nro Afiliado'),
        ];
    }
}
