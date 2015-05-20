<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Segurosambulancias */

$this->title = 'Alta de seguro';
$this->params['breadcrumbs'][] = ['label' => 'Seguros de Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segurosambulancias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
