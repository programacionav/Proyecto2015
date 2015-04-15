<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obrassociales".
 *
 * @property integer $idObraSocial
 * @property string $Descripcion
 */
class Obrassociales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obrassociales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idObraSocial' => Yii::t('app', 'Id Obra Social'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
