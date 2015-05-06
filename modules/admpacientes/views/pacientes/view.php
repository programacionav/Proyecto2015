<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */

$this->title = $model->Apellido." ".$model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idPaciente',
            //'Apellido',
            //'Nombre',
            'DNI',
            //'idLocalidad',
            'Direccion',
            'FechaNac',
            'FechaAlta',
            'Email:email',
        ],
    ]) ?>

</div>

    <!-- Brand and toggle get grouped for better mobile display -->
   
   <p>
        <?= Html::a(Html::encode('Ver Ficha'), ['ficha', 'id' => $model->idPaciente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->idPaciente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->idPaciente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
       
       
    </p>

    