<?php
//
namespace app\models;

use Yii;

/**
 * This is the model class for table "estadoslicencias".
 *
 * @property integer $idEstado
 * @property string $Descripcion
 *
 * @property Licencias[] $licencias
 */
class EstadosLicencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadoslicencias';
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
            'idEstado' => Yii::t('app', 'Id Estado'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicencias()
    {
        return $this->hasMany(Licencias::className(), ['idEstado' => 'idEstado']);
    }
}
