<?php 
use yii\grid\GridView;
use yii\helpers\Html;
?>
<h1><?= Html::encode($nombre.' - '.$apellido) ?></h1>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'idCapacitacion', 'value' => 'idCapacitacion0.Nombre' ],
            'Resultado',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>