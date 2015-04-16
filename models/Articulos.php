<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulos".
 *
 * @property integer $idArticulo
 * @property string $Codigo
 * @property string $Titulo
 * @property string $Texto
 * @property string $FechaAlta
 * @property integer $idEstado
 * @property integer $idEmpleado
 *
 * @property Estadosarticulos $idEstado0
 * @property Empleados $idEmpleado0
 * @property Tagsarticulos[] $tagsarticulos
 * @property Tags[] $idTags
 */
class Articulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Codigo', 'Titulo', 'Texto', 'FechaAlta', 'idEstado', 'idEmpleado'], 'required'],
            [['Texto'], 'string'],
            [['FechaAlta'], 'safe'],
            [['idEstado', 'idEmpleado'], 'integer'],
            [['Codigo'], 'string', 'max' => 10],
            [['Titulo'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idArticulo' => 'Id Articulo',
            'Codigo' => 'Codigo',
            'Titulo' => 'Titulo',
            'Texto' => 'Texto',
            'FechaAlta' => 'Fecha Alta',
            'idEstado' => 'Id Estado',
            'idEmpleado' => 'Id Empleado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estadosarticulos::className(), ['idestado' => 'idEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsarticulos()
    {
        return $this->hasMany(Tagsarticulos::className(), ['idArticulo' => 'idArticulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTags()
    {
        return $this->hasMany(Tags::className(), ['idTag' => 'idTag'])->viaTable('tagsarticulos', ['idArticulo' => 'idArticulo']);
    }
}
