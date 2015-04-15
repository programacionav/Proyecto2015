<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TiposPracticas */

$this->title = Yii::t('app', 'Create Tipos Practicas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos Practicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-practicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
