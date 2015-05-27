<?php

namespace app\modules\admpersonal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Administrativos;

/**
 * AdministrativosSearch represents the model behind the search form about `app\models\Administrativos`.
 */
class AdministrativosSearch extends Administrativos
{
    /**
     * @inheritdoc
     */
    //Empleado
    public $idEmpleado;
    public $Apellido;
    public $Nombre;
    public $DNI;
    public $NroEmpleado;
    public $FechaIngreso;
    public $Email;
    public $Activo;
    public $FechaBaja;
    
    //Sector
    public $Descripcion;
    public $idSector;
    
    public function rules()
    {
        return [
            [['idEmpleado', 'idSector'], 'integer'],
            [['Apellido', "Nombre", "DNI", "NroEmpleado", "FechaIngreso", "Email", "Activo", "FechaBaja", "idSector", "Descripcion"], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Administrativos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes'=>[
                'Nombre'=>['asc'=>['Nombre'=>SORT_ASC],
        		'desc'=>['Nombre'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'Apellido'=>['asc'=>['Apellido'=>SORT_ASC],
        		'desc'=>['Apellido'=>SORT_DESC],
        		'default'=>SORT_DESC],
                'FechaIngreso'=>['asc'=>['FechaIngreso'=>SORT_ASC],
        		'desc'=>['FechaIngreso'=>SORT_DESC],
        		'default'=>SORT_DESC],
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['idEmpleado0']);
            $query->joinWith(['idEspecialidad0']);
            $query->joinWith(['idSector0']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idEmpleado' => $this->idEmpleado,
            'idSector' => $this->idSector,
        ]);
        
        $query->joinWith(['idEmpleado0'=>function ($q){
        	$q->where('empleados.Activo = 1');
        }
        ]);
        

        return $dataProvider;
    }
}
