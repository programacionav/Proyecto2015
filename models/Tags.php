<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $idTag
 * @property string $Descripcion
 *
 * @property Tagsarticulos[] $tagsarticulos
 * @property Articulos[] $idArticulos
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
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
            'idTag' => 'Id Tag',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsarticulos()
    {
        return $this->hasMany(Tagsarticulos::className(), ['idTag' => 'idTag']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArticulos()
    {
        return $this->hasMany(Articulos::className(), ['idArticulo' => 'idArticulo'])->viaTable('tagsarticulos', ['idTag' => 'idTag']);
    }
}
