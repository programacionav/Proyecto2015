<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\AdministrativosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administrativos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administrativos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a(Yii::t('app', 'Create Administrativos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idEmpleado',
            //'idSector',
            'secDescripcion',
            'Nombre',
            'Apellido',
            'FechaIngreso',
            'licencia' => [
                'label' => 'Licencia',
                'format' => 'raw',
                'value' => function ($data){
                if ($data->Activo == 1){
                return Html::a('Licencia',['licencias/create', 'idEmpleado' => $data->idEmpleado, 'idEstado' => "3" ] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-success']);//idEmpleado
                }else{return "<center>-------</center>";}}
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

</div>
