<?php

namespace app\modules\admambulancias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Revisionestecnicas;

/**
 * RevisionestecnicasSearch represents the model behind the search form about `app\models\Revisionestecnicas`.
 */
class RevisionestecnicasSearch extends Revisionestecnicas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRevision'], 'integer'],
            [['Patente', 'Taller', 'FechaCarga', 'FechaVigencia', 'Observaciones'], 'safe'],
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
        $query = Revisionestecnicas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        $dataProvider->setSort([
        'attributes'=>[
            'idRevision',
            'Patente',
            'Taller',
            'FechaCarga',
            'FechaVigencia',
            'vencimiento'=>[
                'asc'=>['FechaVigencia'=>SORT_ASC],
                'desc'=>['FechaVigencia'=>SORT_DESC],
                'label'=>'Estado 2',
                'default'=>SORT_ASC
            ]
        ]
    ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $buscarFechaVigencia=$this->FechaVigencia;
        if(isset($this->FechaVigencia)&&$this->FechaVigencia!=null&& substr_count($this->FechaVigencia, "/")==2)
        {
            $fecha = $this->FechaVigencia; 

            list($dia,$mes,$anio) = explode("/",$fecha); 

            $buscarFechaVigencia=$anio.'-'.$mes.'-'.$dia;
            
        //print_r($this->FechaVigencia);
        //exit();
        }
        switch (strtolower($this->FechaVigencia)) {
            case "enero":
                $buscarFechaVigencia='-01-';
                break;
            case "febrero":
                $buscarFechaVigencia='-02-';
                break;
            case "marzo":
                $buscarFechaVigencia='-03-';
                break;
            case "abril":
                $buscarFechaVigencia='-04-';
                break;
            case "mayo":
                $buscarFechaVigencia='-05-';
                break;
            case "junio":
                $buscarFechaVigencia='-06-';
                break;
            case "julio":
                $buscarFechaVigencia='-07-';
                break;
            case "agosto":
                $buscarFechaVigencia='-08-';
                break;
            case "septiembre":
                $buscarFechaVigencia='-09-';
                break;
            case "octubre":
                $buscarFechaVigencia='-10-';
                break;
            case "noviembre":
                $buscarFechaVigencia='-11-';
                break;
            case "diciembre":
                $buscarFechaVigencia='-12-';
                break;
        }
        $query->andFilterWhere(['like','FechaVigencia', $buscarFechaVigencia]);
        
        //Fecha de carga
        $buscarFechaCarga=$this->FechaCarga;
        if(isset($this->FechaCarga)&&$this->FechaCarga!=null&& substr_count($this->FechaCarga, "/")==2)
        {
            $fecha = $this->FechaCarga; 

            list($dia,$mes,$anio) = explode("/",$fecha); 

            $buscarFechaCarga=$anio.'-'.$mes.'-'.$dia;
            
        //print_r($this->FechaVigencia);
        //exit();
        }
        switch (strtolower($this->FechaCarga)) {
            case "enero":
                $buscarFechaCarga='-01-';
                break;
            case "febrero":
                $buscarFechaCarga='-02-';
                break;
            case "marzo":
                $buscarFechaCarga='-03-';
                break;
            case "abril":
                $buscarFechaCarga='-04-';
                break;
            case "mayo":
                $buscarFechaCarga='-05-';
                break;
            case "junio":
                $buscarFechaCarga='-06-';
                break;
            case "julio":
                $buscarFechaCarga='-07-';
                break;
            case "agosto":
                $buscarFechaCarga='-08-';
                break;
            case "septiembre":
                $buscarFechaCarga='-09-';
                break;
            case "octubre":
                $buscarFechaCarga='-10-';
                break;
            case "noviembre":
                $buscarFechaCarga='-11-';
                break;
            case "diciembre":
                $buscarFechaCarga='-12-';
                break;
        }
        $query->andFilterWhere(['like','FechaCarga', $buscarFechaCarga]);

        $query->andFilterWhere([
            'idRevision' => $this->idRevision,
           
        ]);

        $query->andFilterWhere(['like', 'Patente', $this->Patente])
            ->andFilterWhere(['like', 'Taller', $this->Taller])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
}
