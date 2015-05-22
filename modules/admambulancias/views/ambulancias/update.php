<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ffdddd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Ambulancias */

$this->title = 'Actualizar Ambulancias: ' . ' ' . $model->Patente;
$this->params['breadcrumbs'][] = ['label' => 'Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Patente, 'url' => ['view', 'id' => $model->Patente]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ambulancias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'arreDatos'=>$arreDatos,
    ])
    ?>

</div>
