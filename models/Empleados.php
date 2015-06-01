<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property integer $idEmpleado
 * @property string $Apellido
 * @property string $Nombre
 * @property integer $DNI
 * @property integer $NroEmpleado
 * @property string $FechaIngreso
 * @property string $Email
 * @property integer $Activo
 * @property string $FechaBaja
 *
 * @property Administrativos $administrativos
 * @property Ambulancias[] $ambulancias
 * @property Articulos[] $articulos
 * @property Doctores $doctores
 * @property Enfermeros $enfermeros
 * @property Licencias[] $licencias
 * @property Liquidacionmensual[] $liquidacionmensuals
 * @property Reservas[] $reservas
 * @property Usuarios[] $usuarios
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $matricula;
    public $tipoEmpleado;
    public $idEspecialidad;
    public $idSector;
    public $secDescripcion;
    public $licencia;
    public $activo2;
    public $activo;
    
    
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apellido', 'Nombre', 'DNI', 'NroEmpleado', 'FechaIngreso'], 'required'],
            [['DNI', 'NroEmpleado', 'Activo'], 'integer'],
            [['FechaIngreso', 'FechaBaja'], 'safe'],
            [['Apellido', 'Nombre'], 'string', 'max' => 50],
            [['Email'], 'string', 'max' => 100],
            [['DNI'], 'unique'],
            [['NroEmpleado'], 'unique'],
            [['matricula','tipoEmpleado', "idEspecialidad", "idSector", "secDescripcion", "licencia", "activo2"], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmpleado' => Yii::t('app', 'Id Empleado'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'DNI' => Yii::t('app', 'Dni'),
            'NroEmpleado' => Yii::t('app', 'Nro Empleado'),
            'FechaIngreso' => Yii::t('app', 'Fecha Ingreso'),
            'Email' => Yii::t('app', 'Email'),
            'Activo' => Yii::t('app', 'Activo'),
            'FechaBaja' => Yii::t('app', 'Fecha Baja'),
            'idEspecialidad' => Yii::t('app', 'Especialidad'),
            'activo2' => Yii::t('app', "Activo"),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getAdministrativos()
    {
        return $this->hasOne(Administrativos::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmbulancias()
    {
        return $this->hasMany(Ambulancias::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulos::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctores()
    {
        return $this->hasOne(Doctores::className(), ['idDoctor' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeros()
    {
        return $this->hasOne(Enfermeros::className(), ['idEnfermero' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicencias()
    {
        return $this->hasMany(Licencias::className(), ['idEmpleado' => 'idEmpleado']);
    }
    
    public function getLicencia()
    {
        return "EstoEsUnaLicencia";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiquidacionmensuals()
    {
        return $this->hasMany(Liquidacionmensual::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['idEmpleado' => 'idEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['idEmpleado' => 'idEmpleado']);
    }
    
    public function getAntiguedad()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
           $fechaActual = date("Y-m-d");
            $FechaIngreso = $this->FechaIngreso;
            
            $faa = substr($fechaActual, 0, 4);
            $fam = substr($fechaActual, 5, 2);
            $fad = substr($fechaActual, 8, 2);
            
            $fia = substr($FechaIngreso, 0, 4);
            $fim = substr($FechaIngreso, 5, 2);
            $fid = substr($FechaIngreso, 8, 2);
            
            $antiguedad = $faa - $fia;
            
            if ($fam < $fim){ $antiguedad-= 1;}
            else
            {
                if ($fim == $fam)
                    {
                        if($fid < $fad){$antiguedad-= 1;}
                    }
            }
            return $antiguedad;
    }
    
    
    
}
