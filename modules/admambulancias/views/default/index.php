<?php

use yii\helpers\Html;
use yii\grid\GridView;

echo '<style>
body {background-color:#ccc}
</style> ';
//a    {color:black}
//a:hover    {color:#ff5a85}
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\RevisionestecnicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Administrador de Ambulancias';
$usuario = Yii::$app->user->identity;
$rol = 'Bienvenido ';

?>

<?php
switch ($usuario['idRol']){
    case 1: $rol= $rol.$usuario['Usuario'].' (Administrador)';
                break;
    case 2: $rol= $rol.$usuario['Usuario'].' (Doctor)';
                break;
    case 3: $rol= $rol.$usuario['Usuario'].' (Enfermero)';
                break;
                default : $rol= $rol.'usuario invitado';
                break;
    
}


?>
<h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
<br/>
<?php echo "<p style='text-align:center;'>".$rol."</p>"; ?>
<br/>
<div style="text-align: center" class="admambulancias-default-index">

    <img src="../../../modules/admambulancias/ambulancia.png" alt="kasa" class="img-circle" height="200px" width="200px">
    <br/><br/>

    <div class="btn-group btn-group-lg" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="glyphicon glyphicon-plus" style="color: red" aria-hidden="true"></span>
        Ambulancias
        <span class="caret"></span>
    </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="ambulancias">Principal</a></li>
            <li><a href="ambulancias/create">Crear Ambulancia</a></li>
        </ul>
    </div>
    
    <div class="btn-group btn-group-lg" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="glyphicon glyphicon-wrench" style="color: blue" aria-hidden="true"></span>
        Revisiones Técnicas
        <span class="caret"></span>
    </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="revisionestecnicas">Principal</a></li>
            <li><a href="revisionestecnicas/create">Crear Revision</a></li>
        </ul>
        
        
    </div>
    
    <div class="btn-group btn-group-lg" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="glyphicon glyphicon-briefcase" style="color: green"  aria-hidden="true"></span>
        Seguros
        <span class="caret"></span>
    </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="segurosambulancias">Principal</a></li>
            <li><a href="segurosambulancias/create">Crear Seguro</a></li>
        </ul>
    </div>
    
</div>
