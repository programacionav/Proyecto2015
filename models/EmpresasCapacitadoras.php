<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresascapacitadoras".
 *
 * @property integer $idEmpresa
 * @property string $Cuit
 * @property string $RazonSocial
 * @property string $Direccion
 * @property string $Telefono
 *
 * @property Capacitadores[] $capacitadores
 */
class EmpresasCapacitadoras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresascapacitadoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cuit', 'RazonSocial'], 'required'],
            [['Cuit'], 'string', 'max' => 15],
            [['RazonSocial'], 'string', 'max' => 100],
            [['Direccion'], 'string', 'max' => 250],
            [['Telefono'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmpresa' => 'Id Empresa',
            'Cuit' => 'Cuit',
            'RazonSocial' => 'Razon Social',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacitadores()
    {
        return $this->hasMany(Capacitadores::className(), ['idEmpresaCapacitadora' => 'idEmpresa']);
    }
}
