<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\EnfermerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Enfermeros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermeros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'espDescripcion',
            "Apellido",
            "Nombre",
            "FechaIngreso",
            //'idEnfermero',
            
            //'idEspecialidad',
            

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?php //= Html::a(Yii::t('app', 'Agregar Enfermero'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
