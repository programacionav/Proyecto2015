<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "insumos".
 *
 * @property integer $idInsumo
 * @property integer $NroSerie
 * @property integer $idProveedor
 * @property string $FechaVencimiento
 * @property string $Descripcion
 * @property string $Precio
 * @property integer $Stock
 *
 * @property Proveedor $idProveedor0
 * @property Itemspartesalida[] $itemspartesalidas
 * @property Itemspedidocompra[] $itemspedidocompras
 */
class Insumos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insumos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NroSerie', 'idProveedor', 'FechaVencimiento', 'Descripcion', 'Precio', 'Stock'], 'required'],
            [['NroSerie', 'idProveedor', 'Stock'], 'integer'],
            [['FechaVencimiento'], 'safe'],
            [['Precio'], 'number'],
            [['Descripcion'], 'string', 'max' => 250],
            [['NroSerie'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInsumo' => 'Id Insumo',
            'NroSerie' => 'Nro Serie',
            'idProveedor' => 'Id Proveedor',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'Descripcion' => 'Descripcion',
            'Precio' => 'Precio',
            'Stock' => 'Stock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor0()
    {
        return $this->hasOne(Proveedor::className(), ['idProveedor' => 'idProveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemspartesalidas()
    {
        return $this->hasMany(Itemspartesalida::className(), ['idInsumo' => 'idInsumo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemspedidocompras()
    {
        return $this->hasMany(Itemspedidocompra::className(), ['idInsumo' => 'idInsumo']);
    }
}
