<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admwiki\models\TagsarticulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tagsarticulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagsarticulos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tagsarticulos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idArticulo',
        	'idArticulo0.Titulo',
            'idTag',
        	'idTag0.Descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
