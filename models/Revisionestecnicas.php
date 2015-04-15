<?php

namespace app\models;

use Yii;

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
