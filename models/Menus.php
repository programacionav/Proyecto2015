<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property integer $idMenu
 * @property string $Fecha
 * @property string $Descripcion
 * @property string $Precio
 *
 * @property Reservas[] $reservas
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'Descripcion', 'Precio'], 'required'],
            [['Fecha'], 'safe'],
            [['Descripcion'], 'string'],
            [['Precio'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMenu' => 'Id Menu',
            'Fecha' => 'Fecha',
            'Descripcion' => 'Descripcion',
            'Precio' => 'Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['idMenu' => 'idMenu']);
    }
}
