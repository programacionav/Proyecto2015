<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#EEE}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Ambulancias */

$this->title = 'Crear Ambulancia';
$this->params['breadcrumbs'][] = ['label' => 'Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambulancias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'arreDatos'=>$arreDatos,
    ])
    ?>

</div>
