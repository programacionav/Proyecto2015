<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpacientes\PacientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pacientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacientes-index">

    <h1><?= Html::encode($this->title) ?></h1><br>
    <?php 
    
    //NavBar::begin(['brandLabel' => 'NavBar Test']);
//echo Nav::widget([
    //'items' => [
      //  ['label' => 'Home', 'url' => ['/site/index']],
        //['label' => 'About', 'url' => ['/site/about']],
    //],
//]);
//NavBar::end();
 ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pacientes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'idPaciente',
            'Apellido',
            'Nombre',
            'DNI',
            //'idLocalidad',
            // 'Direccion',
            // 'FechaNac',
            // 'FechaAlta',
            // 'Email:email',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>

<?php// Html::a(Html::encode('Menu Principal'), ['default/index']) ?>
