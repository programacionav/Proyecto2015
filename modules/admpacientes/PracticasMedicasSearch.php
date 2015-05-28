<?php

namespace app\modules\admpacientes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PracticasMedicas;

/**
 * PracticasMedicasSearch represents the model behind the search form about `app\models\PracticasMedicas`.
 */
class PracticasMedicasSearch extends PracticasMedicas
{
    /**
     * @inheritdoc
     */
    
    public $Descripcion;
   
    public function rules()
    {
        return [
            [['idPractica', 'idTipoPractica', 'idDoctor', 'idPaciente', 'idObraSocial'], 'integer'],
            [['FechaSolicitud', 'FechaHoraRealizado', 'Resultado', 'Adjunto','Descripcion'], 'safe'],
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
        $query = PracticasMedicas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->joinWith(['tiposPracticas']);//// uncomment the following line if you do not want to any records when validation fails
          
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idPractica' => $this->idPractica,
            'idTipoPractica' => $this->idTipoPractica,
            'FechaSolicitud' => $this->FechaSolicitud,
            'FechaHoraRealizado' => $this->FechaHoraRealizado,
            'idDoctor' => $this->idDoctor,
            'idPaciente' => $this->idPaciente,
            'idObraSocial' => $this->idObraSocial,
        ]);

        $query->andFilterWhere(['like', 'Resultado', $this->Resultado])
            ->andFilterWhere(['like', 'Adjunto', $this->Adjunto]);
        $query->joinWith(['tiposPracticas'=>function($q){
            
            $q->where('tiposPracticas.Descripcion LIKE "%'.$this->Descripcion.'%"');
        }]);
        
         
        
        return $dataProvider;
    }
}
