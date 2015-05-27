<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\SectoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sectores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-index">

    <h1>Administrativos | <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idSector',
            'Descripcion',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}']
        ],
    ]); ?>
<p>
        <?= Html::a(Yii::t('app', 'Crear Sector'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
