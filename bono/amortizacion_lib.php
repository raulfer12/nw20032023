<?php
    function cuotaNivelada($num1, $num2, $num3){
        return ($num1*$num2)/(1-(1+$num2)**-$num3);
    }
    function porcentaje($num1){
        return $num1/100;
    }
    function saldo($num1, $num2){
        return $num1-$num2;
    }
    function interesMensual($num1){
        return $num1/12;
    }
?>