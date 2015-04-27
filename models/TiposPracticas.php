<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipospracticas".
 *
 * @property integer $idTipoPractica
 * @property string $Descripcion
 */
class TiposPracticas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipospracticas';
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
            'idTipoPractica' => Yii::t('app', 'Id Tipo Practica'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
