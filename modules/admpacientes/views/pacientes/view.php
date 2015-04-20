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

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idPaciente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idPaciente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
    <?php echo Html::a(Html::encode('Ver Consultas'),['consultas/index','id'=>$model->idPaciente])?>
        <a class="navbar-brand" href="index.php?r=admpacientes/pacientes">Ver Practicas</a>
      <a class="navbar-brand" href="index.php?r=admpacientes/consultas">Ver Consultas</a>
    
   