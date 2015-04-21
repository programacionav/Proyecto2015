<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capacitadores".
 *
 * @property integer $idCapacitador
 * @property integer $idEmpresaCapacitadora
 * @property string $Apellido
 * @property string $Nombre
 * @property integer $idEspecialidad
 *
 * @property Capacitaciones[] $capacitaciones
 * @property Especialidades $idEspecialidad0
 * @property Empresascapacitadoras $idEmpresaCapacitadora0
 */
class Capacitadores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capacitadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCapacitador', 'idEmpresaCapacitadora', 'Apellido', 'Nombre', 'idEspecialidad'], 'required'],
            [['idCapacitador', 'idEmpresaCapacitadora', 'idEspecialidad'], 'integer'],
            [['Apellido', 'Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCapacitador' => 'Id Capacitador',
            'idEmpresaCapacitadora' => 'Id Empresa Capacitadora',
            'Apellido' => 'Apellido',
            'Nombre' => 'Nombre',
            'idEspecialidad' => 'Id Especialidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapacitaciones()
    {
        return $this->hasMany(Capacitaciones::className(), ['idCapacitador' => 'idCapacitador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidad0()
    {
        return $this->hasOne(Especialidades::className(), ['idEspecialidad' => 'idEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresaCapacitadora0()
    {
        return $this->hasOne(Empresascapacitadoras::className(), ['idEmpresa' => 'idEmpresaCapacitadora']);
    }
}
