<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiposlicencias".
 *
 * @property integer $idTipoLicencia
 * @property string $Descripcion
 * @property integer $AntiguedadMinima
 *
 * @property Licencias[] $licencias
 */
class Tiposlicencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiposlicencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion', 'AntiguedadMinima'], 'required'],
            [['AntiguedadMinima'], 'integer'],
            [['Descripcion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoLicencia' => Yii::t('app', 'Id Tipo Licencia'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'AntiguedadMinima' => Yii::t('app', 'Antiguedad Minima'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicencias()
    {
        return $this->hasMany(Licencias::className(), ['idTipoLicencia' => 'idTipoLicencia']);
    }
}
