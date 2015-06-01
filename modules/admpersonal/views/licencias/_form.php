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
    function fechaToTxt (fecha)
    {
        year = fecha.getFullYear();
        if (fecha.getMonth() < 10)
            {
                mes = fecha.getMonth()+1;
                month = "0"+mes; 
            }
        else{month = fecha.getMonth()+1;}
            
        if (fecha.getDate() < 10)
            {
                dia = fecha.getDate();
                day = "0"+dia; 
            }
        else{day = fecha.getDate();}
                        
        return year+"-"+month+"-"+day;
        
    }
    
    function fechaTxtToDate(fecha)
    {
                    syear = fecha.slice(0,4);
                    smonth = fecha.slice(5,7) - 1;
                    sday = fecha.slice(8,10);
                    
                    return new Date(syear ,smonth , sday);
    }
    
    $(document).ready(function() {
            $("#licencias-fechainicio").change(
                    function(){
                    fechaSeleccionada = fechaTxtToDate($("#licencias-fechainicio").val());
                    fechaActual = new Date();
                    
                    if (fechaSeleccionada < fechaActual)
                    {   
                        alert("Debe Introducir una fecha valida");
                        
                        $("#licencias-fechainicio").val(fechaToTxt(fechaActual));
                    }
                    
                    tipoLicencia = $("#licencias-idtipolicencia").val();
                    fechaSeleccionada = fechaTxtToDate($("#licencias-fechainicio").val());
                    fechaFin = fechaSeleccionada;
                    
                    if (tipoLicencia == "1")
                    {fechaFin.setDate(fechaSeleccionada.getDate() + 7);}
                    else if(tipoLicencia === "2"){fechaFin.setDate(fechaSeleccionada.getDate() + 14);}
                    else if(tipoLicencia === "3"){fechaFin.setDate(fechaSeleccionada.getDate() + 21);}
                    else if(tipoLicencia === "4"){fechaFin.setDate(fechaSeleccionada.getDate() + 28);}
                    else if(tipoLicencia === "5"){fechaFin.setDate(fechaSeleccionada.getDate() + 35);}
                    else{fechaFin.setDate(fechaSeleccionada.getDate() + 7);}
                        
                    
                    /*switch(tipoLicencia)
                        {
                            case (tipoLicencia === "1"):
                              fechaFin.setDate(fechaSeleccionada.getDate() + 7);
                              break;
                            case (tipoLicencia === "2"):
                              fechaFin.setDate(fechaSeleccionada.getDate() + 14);
                              break;
                            case (tipoLicencia === "3"):
                              fechaFin.setDate(fechaSeleccionada.getDate() + 21);
                              break;
                            case (tipoLicencia === "4"):
                              fechaFin.setDate(fechaSeleccionada.getDate() + 28);
                              break;
                            case (tipoLicencia === "5"):
                              fechaFin.setDate(fechaSeleccionada.getDate() + 35);
                              break;
                          
                        }*/
                   //fecha = fechaFin.getFullYear()+"-"+fechaFin.getMonth()+"-"fechaFin.getDate()
                            
                    $("#licencias-fechafin").val(fechaToTxt(fechaFin)); 
                })
                
            /*$("#licencias-fechafin").change(
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
                        alert("Debe Introducir una fecha fin posterior a la de inicio");
                        
                        $("#licencias-fechafin").val(fechaToTxt(fechaSeleccionada));
                    }
                    })*/
        }
                
           
                
            
        
            )
        
</script>
<div class="licencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoLicencia')->dropDownList(ArrayHelper::map(\app\models\Tiposlicencias::find()->andFilterWhere(['and',"AntiguedadMinima <= $antiguedad"])->all(), "idTipoLicencia", "Descripcion")) ?>

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
