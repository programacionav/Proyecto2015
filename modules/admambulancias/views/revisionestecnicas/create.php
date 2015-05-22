<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Revisionestecnicas */

$this->title = 'Registrar Revision';
$this->params['breadcrumbs'][] = ['label' => 'Revisiones Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisionestecnicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
