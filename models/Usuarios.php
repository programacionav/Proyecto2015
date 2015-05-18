<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id
 * @property string $Usuario
 * @property string $Clave
 * @property integer $idRol
 * @property integer $idEmpleado
 *
 * @property Roles $idRol0
 * @property Empleados $idEmpleado0
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_ADMIN = 1;
    const ROLE_DOCTOR = 2;
    const ROLE_ENFER = 3;
    
	/*********** agregar para interface *********************/
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	
	public static function findIdentityByAccessToken($token, $type = NULL)
	{
		return static::findOne(['access_token' => $token]);
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getAuthKey()
	{
		return $this->Clave;
	}
	
	public function validateAuthKey($authKey)
	{
		return $this->authKey === $authKey;
	}
	
	/*agregar para funcionamiento*/
	public static function findByUsername($username)
	{
		return static::findOne(['Usuario' => $username]);
	}
	
	public function validatePassword($authKey)
	{
		return $this->Clave === $authKey;
	}
	
	public function getUsername()
	{
		return $this->Usuario;
	}
	
	public function getRol(){
		return $this->idRol0->Rol;
	}
	
	public static function roleInArray($arr_role)
	{
		return in_array(Yii::$app->user->identity->idRol, $arr_role);
	}
	/********************************/
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuario', 'Clave', 'idRol', 'idEmpleado'], 'required'],
            [['idRol', 'idEmpleado'], 'integer'],
            [['Usuario'], 'string', 'max' => 255],
            [['Clave'], 'string', 'max' => 32],
            [['Usuario'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Usuario' => 'Usuario',
            'Clave' => 'Clave',
            'idRol' => 'Id Rol',
            'idEmpleado' => 'Id Empleado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol0()
    {
        return $this->hasOne(Roles::className(), ['id' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado0()
    {
        return $this->hasOne(Empleados::className(), ['idEmpleado' => 'idEmpleado']);
    }
}
