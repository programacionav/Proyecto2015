<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\jui\DatePicker;

?>

    


    <?= $this->render('/consultas\_search',[
        'id'=>$id,
        'searchModel2'=>$searchModel2,
        'dataProvider2'=>$dataProvider2,
    ])?>

    <?= $this->render('/consultas\index',[
        
        'searchModel2'=>$searchModel2,
        'dataProvider2'=>$dataProvider2,
    ])?> 
<br><br>
<?= $this->render('/practicas-medicas\index',[
        
        'searchModel'=>$searchModel,
        'dataProvider'=>$dataProvider,
    ])?>