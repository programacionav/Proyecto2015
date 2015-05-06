<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidocompra".
 *
 * @property integer $idPedido
 * @property string $Fecha
 * @property integer $idProveedor
 *
 * @property Itemspedidocompra[] $itemspedidocompras
 * @property Proveedor $idProveedor0
 */
class PedidoCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedidocompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'idProveedor'], 'required'],
            [['Fecha'], 'safe'],
            [['idProveedor'], 'integer'],			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPedido' => 'Id Pedido',
            'Fecha' => 'Fecha',
            'idProveedor' => 'Id Proveedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemspedidocompras()
    {
        return $this->hasMany(Itemspedidocompra::className(), ['idPedido' => 'idPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor0()
    {
        return $this->hasOne(Proveedor::className(), ['idProveedor' => 'idProveedor']);
    }
    public function getRazonSocial(){
    	return $this->idProveedor0->RazonSocial;
    }
}
