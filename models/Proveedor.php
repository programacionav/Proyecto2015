<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $idProveedor
 * @property string $RazonSocial
 * @property string $CUIT
 * @property string $Direccion
 * @property string $Telefono
 *
 * @property Insumos[] $insumos
 * @property Pedidocompra[] $pedidocompras
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RazonSocial', 'CUIT', 'Direccion', 'Telefono'], 'required'],
            [['RazonSocial', 'Direccion'], 'string', 'max' => 250],
            [['CUIT'], 'string', 'max' => 13],
            [['Telefono'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProveedor' => 'Id Proveedor',
            'RazonSocial' => 'Razon Social',
            'CUIT' => 'Cuit',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsumos()
    {
        return $this->hasMany(Insumos::className(), ['idProveedor' => 'idProveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidocompras()
    {
        return $this->hasMany(Pedidocompra::className(), ['idProveedor' => 'idProveedor']);
    }
}
