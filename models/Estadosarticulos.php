<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadosarticulos".
 *
 * @property integer $idestado
 * @property string $Descripcion
 *
 * @property Articulos[] $articulos
 */
class Estadosarticulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadosarticulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestado' => 'Idestado',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulos::className(), ['idEstado' => 'idestado']);
    }
}
