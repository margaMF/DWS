<?php 
class Calculadora {


    function __construct(){

    }


    public function resultadoFactorial ($numero){

        if ($numero == 0){
            return 1;
        } elseif ($numero > 0){
            $result = 1;
            while ($numero > 0){
                $result = $result * $numero;
                $numero = $numero - 1;
                
            }
            return $result;
        }else{
            echo "El valor del número ha de ser mayor o igual a 0.";
        }
    }

    public function coeficienteBinomial($numero1, $numero2){

        $factorialNum1 = $this-> resultadoFactorial($numero1);
        $factorialNum2 = $this->resultadoFactorial($numero2);
        $diferencia = $numero1 - $numero2;
        $factorialNum3 = $this->resultadoFactorial($diferencia);
        $resultado = $factorialNum1 / ($factorialNum2 * $factorialNum3);

        return $resultado;
        

    }
    
     public function convierteBinarioDecimal($cadenaBits){
        $potencias = 0;
        $largoCadena = count($cadenaBits);
        $resultado = 0;

        for ($i = 0; $i < $largoCadena; $i++){
            $base = 2;
            
            
            if ($cadenaBits[($largoCadena - 1) - $i] == 1){
                $potencias = $base ** $i;
                $resultado = $resultado + $potencias;
                
            }
            
        }   
        
        return $resultado;
        
     }

     public function sumaNumerosPares($arrayNumeros){
        $longitudArray = count($arrayNumeros);
        $resultado = 0;

        for ($i = 0; $i < $longitudArray; $i++ ){
           
            if (($arrayNumeros[$i] % 2) == 0){
                
                $resultado = $resultado + $arrayNumeros[$i];
    
            }

        }

        return $resultado;

     }

     public function esPalindromo(){

        

     }

}