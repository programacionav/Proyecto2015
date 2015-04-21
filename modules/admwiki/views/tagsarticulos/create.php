<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tagsarticulos */

$this->title = 'Create Tagsarticulos';
$this->params['breadcrumbs'][] = ['label' => 'Tagsarticulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagsarticulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
