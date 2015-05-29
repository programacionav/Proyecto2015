<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capacitaciones".
 *
 * @property integer $idCapacitacion
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Fecha
 * @property integer $DuracionHoras
 * @property integer $idCapacitador
 *
 * @property Capacitadores $idCapacitador0
 * @property Capacitacionesdoctores[] $capacitacionesdoctores
 */
class Capacitaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capacitaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCapacitacion', 'Nombre', 'Descripcion', 'Fecha', 'DuracionHoras', 'idCapacitador'], 'required'],
            [['idCapacitacion', 'DuracionHoras', 'idCapacitador'], 'integer'],
            [['Descripcion'], 'string'],
            [['Fecha'], 'safe'],
            [['Nombre'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCapacitacion' => 'Id Capacitacion',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
            'DuracionHoras' => 'Duracion Horas',
            'idCapacitador' => 'Capacitador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCapacitador0()
    {
        return $this->hasOne(Capacitadores::className(), ['idCapacitador' => 'idCapacitador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacitacionesdoctores()
    {
        return $this->hasMany(Capacitacionesdoctores::className(), ['idCapacitacion' => 'idCapacitacion']);
    }
}
