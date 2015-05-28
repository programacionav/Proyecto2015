<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Licencias */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

<script type="text/javascript">
    $(document).ready(function() {
            $("#licencias-fechainicio").change(
                    function(){
                    fechaSeleccionada = $("#licencias-fechainicio").val();
                    syear = fechaSeleccionada.slice(0,4);
                    smonth = fechaSeleccionada.slice(5,7) - 1;
                    sday = fechaSeleccionada.slice(8,10);
                    
                    fechaSeleccionada = new Date(syear ,smonth , sday);
                    fechaActual = new Date();
                    
                    if (fechaSeleccionada < fechaActual)
                    {
                        year = fechaActual.getFullYear();
                        if (fechaActual.getMonth() < 10)
                            {
                                mes = fechaActual.getMonth()+1;
                                month = "0"+mes; 
                            }
                        else{month = fechaActual.getMonth()+1;}
            
                        if (fechaActual.getDate() < 10)
                            {
                                dia = fechaActual.getDate();
                                day = "0"+dia; 
                            }
                        else{day = fechaActual.getDate();}
                        
                        alert("Debe Introducir una fecha valida");
                        
                        $("#licencias-fechainicio").val(year+"-"+month+"-"+day);
                    }
                    
                    
                     
                })
                
            $("#licencias-fechafin").change(
                    function(){
                        fechaSeleccionada = $("#licencias-fechainicio").val();
                        syear = fechaSeleccionada.slice(0,4);
                        smonth = fechaSeleccionada.slice(5,7) - 1;
                        sday = fechaSeleccionada.slice(8,10);
                    
                        fechaSeleccionada = new Date(syear ,smonth , sday);
                        
                        fechaFin = $("#licencias-fechafin").val();
                        fyear = fechaFin.slice(0,4);
                        fmonth = fechaFin.slice(5,7) - 1;
                        fday = fechaFin.slice(8,10);
                        
                        fechaFin = new Date(fyear ,fmonth , fday);
                        
                        if (fechaSeleccionada > fechaFin)
                    {
                        year = fechaSeleccionada.getFullYear();
                        if (fechaSeleccionada.getMonth() < 10)
                            {
                                mes = fechaSeleccionada.getMonth()+1;
                                month = "0"+mes; 
                            }
                        else{month = fechaSeleccionada.getMonth()+1;}
            
                        if (fechaSeleccionada.getDate()+1 < 10)
                            {
                                dia = fechaSeleccionada.getDate()+1;
                                day = "0"+dia; 
                            }
                        else{day = fechaSeleccionada.getDate();}
                        
                        alert("Debe Introducir una fecha fin posterior a la de inicio");
                        
                        $("#licencias-fechafin").val(year+"-"+month+"-"+day);
                    }
                    })
        }
                
           
                
            
        
            )
        
</script>
<div class="licencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoLicencia')->dropDownList(ArrayHelper::map(\app\models\Tiposlicencias::find()->all(), "idTipoLicencia", "Descripcion")) ?>

    <?php //= $form->field($model, 'idEmpleado')->hiddenInput(["value" => $idEmpleado]) 
        echo '<div class="form-group field-licencias-idempleado required">
<input type="hidden" id="licencias-idempleado" class="form-control" name="Licencias[idEmpleado]" value="'.$idEmpleado.'"></div>';
    ?>

    <?= $form->field($model, 'FechaInicio')->textInput(["type"=>"date"]) ?>

    <?= $form->field($model, 'FechaFin')->textInput(["type"=>"date"]/*, "disabled"=>"disabled*/) ?>

    <?php //= $form->field($model, 'idEstado')->textInput() 
        /*if (isset($_GET['idEstado'])){$idEstado = $_GET['idEstado'];}
        else {$idEstado = "3";}*/
        
        echo '<div class="form-group field-licencias-idestado required">
<input type="hidden" id="licencias-idestado" class="form-control" name="Licencias[idEstado]" value="'.$idEstado.'">

</div>'
    ?>

    <div class="form-group">
        <?php
        if (isset($idEstado))
            {
                if ($idEstado == 1){echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Aprobar Licencia') : Yii::t('app', 'Aprobar Licencia'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);}
                else if ($idEstado == 3){echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Licencia') : Yii::t('app', 'Crear Licencia'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']);} 
                else { echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Rechazar Licencia') : Yii::t('app', 'rechazar Licencia'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']);}
            }
        else
            {
                echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Licencia') : Yii::t('app', 'Actualizar Licencia'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); 
            }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
