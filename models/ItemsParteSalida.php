<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "itemspartesalida".
 *
 * @property integer $idItem
 * @property integer $idParte
 * @property integer $idInsumo
 * @property integer $Cantidad
 *
 * @property Partesalida $idParte0
 * @property Insumos $idInsumo0
 */
class ItemsParteSalida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itemspartesalida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idParte', 'idInsumo', 'Cantidad'], 'required'],
            [['idParte', 'idInsumo', 'Cantidad'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    
    public function attributeLabels()
    {
    	return [
    	'idItem' => 'Id Item',
    	'idParte' => 'Id Parte',
    	'idInsumo' => 'Id Insumo',
    	'Cantidad' => 'Cantidad',
    	'Descripcion' => 'Descripcion',
    	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdParte0()
    {
        return $this->hasOne(Partesalida::className(), ['idParte' => 'idParte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInsumo0()
    {
        return $this->hasOne(Insumos::className(), ['idInsumo' => 'idInsumo']);
    }
    
    public function getDescripcion(){
    	return $this->idInsumo0->Descripcion;
    }
    

}
