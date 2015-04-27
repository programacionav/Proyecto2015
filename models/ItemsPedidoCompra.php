<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itemspedidocompra".
 *
 * @property integer $idItem
 * @property integer $idPedido
 * @property integer $idInsumo
 * @property integer $Cantidad
 *
 * @property Pedidocompra $idPedido0
 * @property Insumos $idInsumo0
 */
class ItemsPedidoCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itemspedidocompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPedido', 'idInsumo', 'Cantidad'], 'required'],
            [['idPedido', 'idInsumo', 'Cantidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idItem' => 'Id Item',
            'idPedido' => 'Id Pedido',
            'idInsumo' => 'Id Insumo',
            'Cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPedido0()
    {
        return $this->hasOne(Pedidocompra::className(), ['idPedido' => 'idPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInsumo0()
    {
        return $this->hasOne(Insumos::className(), ['idInsumo' => 'idInsumo']);
    }
}
