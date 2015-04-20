<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sectores".
 *
 * @property integer $idSector
 * @property string $Descripcion
 *
 * @property Administrativos[] $administrativos
 */
class Sectores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sectores';
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
            'idSector' => Yii::t('app', 'Id Sector'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrativos()
    {
        return $this->hasMany(Administrativos::className(), ['idSector' => 'idSector']);
    }
}
