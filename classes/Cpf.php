<?php    

    class Cpf{
        public static function cpfValido($cpfTeste){
           if(is_numeric($cpfTeste) == FALSE){
               return FALSE;
           }

           if(strlen($cpfTeste) != 11){
               return FALSE;
           }     

           switch ($cpfTeste){
               case('00000000000'):return FALSE;
               case('11111111111'):return FALSE;
               case('22222222222'):return FALSE;
               case('33333333333'):return FALSE;
               case('44444444444'):return FALSE;
               case('55555555555'):return FALSE;
               case('66666666666'):return FALSE;
               case('77777777777'):return FALSE;
               case('88888888888'):return FALSE;
               case('99999999999'):return FALSE;
           }

           $digito1 = null;
           $digito2 = null;              
           $cpfCopia = substr($cpfTeste, 0, 9);

           $somatorio = 0;
           $aux = 10;

           for($i=0; $i<9; $i++){
               $somatorio += ((int)substr($cpfCopia, $i, 1))*$aux;
               $aux--;
           }

           $resto1 = $somatorio%11;

           if($resto1<2)
                $digito1=0;
            else{
                $digito1=11-$resto1;            
            }

            $cpfCopia= $cpfCopia.$digito1;

            $somatorio = 0;        
            $aux = 11;

            for($i=0; $i<10; $i++){
                $somatorio+=((int)substr($cpfCopia, $i, 1))*$aux;
                $aux--;
            }

            $resto2 = $somatorio%11;
            if($resto2<2)
                $digito2=0;
            else{
                $digito2=11-$resto2;            
            }

            $cpfCopia = $cpfCopia.$digito2;

            if($cpfCopia == $cpfTeste){
                return TRUE;
            }
       }
       
       public static function geraCPF(){
           
           $cpfCopia = rand(100000000, 999999999);
           $cpfCopia = (string)$cpfCopia;
           $digito1 = 0;
           $digito2 = 0;
           
            $somatorio = 0;        
            $aux = 10;
        
            for($i=0; $i<9; $i++){
                $somatorio += ((int)substr($cpfCopia, $i, 1))*$aux;  
                $aux--;
            }
            
            $resto1 = $somatorio%11;
            
            if($resto1<2)
                $digito1=0;
            else{
                $digito1=11-$resto1;            
            }

            $cpfCopia = $cpfCopia.$digito1;

            $somatorio = 0;        
            $aux = 11;
            
            for($i=0; $i<10; $i++){
                $somatorio += ((int)substr($cpfCopia, $i, 1))*$aux;  
                $aux--;
            }

            $resto2 = $somatorio%11;
            
            if($resto2<2)
                $digito2=0;
            else{
                $digito2=11-$resto2;            
            }
            
            $cpfCopia = $cpfCopia.$digito2;
            return $cpfCopia;
       }
       
       
    }
    
    
    
    
   
?>
