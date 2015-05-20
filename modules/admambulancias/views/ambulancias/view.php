<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

echo '<style>
body {background-color:#ffdddd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Ambulancias */

$this->title = $model->Patente;
$this->params['breadcrumbs'][] = ['label' => 'Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambulancias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->Patente], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Eliminar', ['delete', 'id' => $model->Patente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de que desea eliminar esta ambulancia?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
        
        
        
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Patente',
            'Marca',
            'Modelo',
            ['attribute' => 'NroMotor','label' => 'N&uacute;mero de Motor'],
            ['attribute' => 'idEmpleado','label' => 'Empleado']
        ],
    ])
    ?>

</div>
