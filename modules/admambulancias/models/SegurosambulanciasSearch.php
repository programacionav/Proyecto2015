<?php

namespace app\modules\admambulancias\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Segurosambulancias;

/**
 * SegurosambulanciasSearch represents the model behind the search form about `app\models\Segurosambulancias`.
 */
class SegurosambulanciasSearch extends Segurosambulancias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idseguro'], 'integer'],
            [['Patente', 'NroPoliza', 'Aseguradora', 'FechaDesde', 'FechaHasta'], 'safe'],
            [['ValorMensual'], 'number'],
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
        $query = Segurosambulancias::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $dataProvider->setSort([
        'attributes'=>[
            'idseguro',
            'Patente',
            'NroPoliza',
            'Aseguradora',
            'FechaDesde',
            'FechaHasta',
            'vencimiento'=>[
                'asc'=>['FechaHasta'=>SORT_ASC],
                'desc'=>['FechaHasta'=>SORT_DESC],
                'label'=>'Estado 2',
                'default'=>SORT_ASC
            ]
        ]
    ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $buscarFechaDesde=$this->FechaDesde;
        if(isset($this->FechaDesde)&&$this->FechaDesde!=null&& substr_count($this->FechaDesde, "/")==2)
        {
            $fecha = $this->FechaDesde; 

            list($dia,$mes,$anio) = explode("/",$fecha); 

            $buscarFechaDesde=$anio.'-'.$mes.'-'.$dia;
            
        //print_r($this->FechaVigencia);
        //exit();
        }
        switch (strtolower($this->FechaDesde)) {
            case "enero":
                $buscarFechaDesde='-01-';
                break;
            case "febrero":
                $buscarFechaDesde='-02-';
                break;
            case "marzo":
                $buscarFechaDesde='-03-';
                break;
            case "abril":
                $buscarFechaDesde='-04-';
                break;
            case "mayo":
                $buscarFechaDesde='-05-';
                break;
            case "junio":
                $buscarFechaDesde='-06-';
                break;
            case "julio":
                $buscarFechaDesde='-07-';
                break;
            case "agosto":
                $buscarFechaDesde='-08-';
                break;
            case "septiembre":
                $buscarFechaDesde='-09-';
                break;
            case "octubre":
                $buscarFechaDesde='-10-';
                break;
            case "noviembre":
                $buscarFechaDesde='-11-';
                break;
            case "diciembre":
                $buscarFechaDesde='-12-';
                break;
        }
        $query->andFilterWhere(['like','FechaDesde', $buscarFechaDesde]);
        //Fecha hasta
        $buscarFechaHasta=$this->FechaHasta;
        if(isset($this->FechaHasta)&&$this->FechaHasta!=null&& substr_count($this->FechaHasta, "/")==2)
        {
            $fecha = $this->FechaHasta; 

            list($dia,$mes,$anio) = explode("/",$fecha); 

            $buscarFechaHasta=$anio.'-'.$mes.'-'.$dia;
            
        //print_r($this->FechaVigencia);
        //exit();
        }
        switch (strtolower($this->FechaHasta)) {
            case "enero":
                $buscarFechaHasta='-01-';
                break;
            case "febrero":
                $buscarFechaHasta='-02-';
                break;
            case "marzo":
                $buscarFechaHasta='-03-';
                break;
            case "abril":
                $buscarFechaHasta='-04-';
                break;
            case "mayo":
                $buscarFechaHasta='-05-';
                break;
            case "junio":
                $buscarFechaHasta='-06-';
                break;
            case "julio":
                $buscarFechaHasta='-07-';
                break;
            case "agosto":
                $buscarFechaHasta='-08-';
                break;
            case "septiembre":
                $buscarFechaHasta='-09-';
                break;
            case "octubre":
                $buscarFechaHasta='-10-';
                break;
            case "noviembre":
                $buscarFechaHasta='-11-';
                break;
            case "diciembre":
                $buscarFechaHasta='-12-';
                break;
        }
        $query->andFilterWhere(['like','FechaHasta', $buscarFechaHasta]);
        

        $query->andFilterWhere([
            'idseguro' => $this->idseguro,
            'ValorMensual' => $this->ValorMensual,
        ]);

        $query->andFilterWhere(['like', 'Patente', $this->Patente])
            ->andFilterWhere(['like', 'NroPoliza', $this->NroPoliza])
            ->andFilterWhere(['like', 'Aseguradora', $this->Aseguradora]);

        return $dataProvider;
    }
}
