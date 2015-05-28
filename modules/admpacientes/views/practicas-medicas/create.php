<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */

$this->title = Yii::t('app', 'Create Practicas Medicas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Practicas Medicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br><div class="practicas-medicas-create"><!--<br>-->

<!--<br>--><h2><div class="col-sm-5" style="background-color: #333 ;color: #CCC;padding: 6px;-webkit-border-radius: 5px;
-moz-border-radius: 5px;border-radius: 5px;">Registrar Practica Medica<div></h2><div style="clear: both;"></div>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
