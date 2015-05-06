<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\EspecialidadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Especialidades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidades-index">

    <h1>Empleados | <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            "idEspecialidad",
            'Descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a(Yii::t('app', 'Crear Especialidad'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
