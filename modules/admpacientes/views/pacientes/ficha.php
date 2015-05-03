<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\jui\DatePicker;

?>

    
    
   <?= Html::beginForm(['ficha','id'=>$id], 'post') ?>

<?php Html::input('text', 'fechaIn') ?>
<?php echo DatePicker::widget([
    'name'  => 'fechaIn',
    
     //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
]);
?>
<?php echo DatePicker::widget([
    'name'  => 'fechaFin',
     //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
]);
?>
<?= Html::submitButton('buscar', ['class' => 'submit']) ?>    
<?= Html::endForm ()  ?>


<br>
 
    

<br>

<h3>Consultas</h3>
    <table class="table table-bordered">
        <tr>
            <th>Fecha y Hora</th>
            <th>Diagnostico</th>
            <th>Tratamiento</th>
        </tr>
        <?php foreach($model as $row){ ?>
        <tr>
            <td><?= $row -> FechaHora ?></td>
            <td><?= $row -> Diagnostico ?></td>
            <td><?= $row -> Tratamiento ?></td>
            
        </tr>
        <?php   } ?>
    </table>

    