<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FormSearch extends Model
{
    public $q;
    public $h;
    
    public function rules() {
        
        return [
            
            ["q","match","pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Solo letras y numeros"],
            ["h","match","pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Solo letras y numeros"]
        ];
    }
    
    public function attributeLabels() {
        
        return [
            
            'q'=> "Desde: ",
            'h'=> "Hasta: ",
        ];
    }
}