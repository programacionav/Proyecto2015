<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagsarticulos".
 *
 * @property integer $idArticulo
 * @property integer $idTag
 *
 * @property Articulos $idArticulo0
 * @property Tags $idTag0
 */
class Tagsarticulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tagsarticulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idArticulo', 'idTag'], 'required'],
            [['idArticulo', 'idTag'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idArticulo' => 'Id Articulo',
            'idTag' => 'Id Tag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArticulo0()
    {
        return $this->hasOne(Articulos::className(), ['idArticulo' => 'idArticulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTag0()
    {
        return $this->hasOne(Tags::className(), ['idTag' => 'idTag']);
    }
}
