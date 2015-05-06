<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Doctores;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\DoctoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Doctores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Doctores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDoctor',
            'idEspecialidad',
            'Matricula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<div>
    <?php
    $doc = new Doctores();
    $doc->idDoctor = 1;
    $doc->idEspecialidad = 1;
    $doc->Matricula = "BMW123";
    
    
    ?>
</div>
