<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidades".
 *
 * @property integer $idLocalidad
 * @property integer $idProvincia
 * @property string $Descripcion
 */
class Localidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLocalidad', 'idProvincia', 'Descripcion'], 'required'],
            [['idLocalidad', 'idProvincia'], 'integer'],
            [['Descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLocalidad' => Yii::t('app', 'Id Localidad'),
            'idProvincia' => Yii::t('app', 'Id Provincia'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
