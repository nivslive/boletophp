<?php

use Dados;

class CodigoDeBarras extends Dados {




	public function gerar() {
     $dados = self::getDados();

        $codigo_barras = $this->codigo_banco.
                               $this->moeda.
                               $this->fator_vencimento.
                               $this->valor.
                               $this->dados['carteira'].
                               $this->dados['nosso_numero'].
                               self::modulo_10($this->dados['agencia'].$this->dados['conta'].$this->dados['carteira'].$this->dados['nosso_numero']).
                               $this->dados['agencia'].$this->dados['conta'].self::modulo_10($this->dados['agencia'].$this->dados['conta']).'000';
                            


        $digito_verificador = self::digitoVerificador_barra($codigo_barras);   
        
        $linha = substr($codigo_barras,0,4).$digito_verificador.substr($codigo_barras,4,43);

        $this->dados["nosso_numero"] = $this->dados['carteira'].'/'.$this->dados['nosso_numero'].'-'.self::modulo_10($this->dados['agencia'].$this->dados['conta'].$this->dados['carteira'].$this->dados['nosso_numero']);
        
        $this->dados["agencia_codigo"] = $this->dados['agencia']." / ". $this->dados['conta']."-".self::modulo_10($this->dados['agencia'].$this->dados['conta']);

        $this->dados["codigo_barras"] = $linha;
        $this->dados["linha_digitavel"] = self::monta_linha_digitavel($linha); 

	}


    private function esquerda($entra,$comp){
        return substr($entra,0,$comp);
    }
    
    private function direita($entra,$comp){
        return substr($entra,strlen($entra)-$comp,$comp);
    }
     
    private function _dateToDays($year,$month,$day) {
        $century = substr($year, 0, 2);
        $year = substr($year, 2, 2);
        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            if ($year) {
                $year--;
            } else {
                $year = 99;
                $century --;
            }
        }
        return ( floor((  146097 * $century)    /  4 ) +
                floor(( 1461 * $year)        /  4 ) +
                floor(( 153 * $month +  2) /  5 ) +
                    $day +  1721119);
    }

	  private function monta_linha_digitavel($codigo) {
            // Alterada por Glauber Portella para especifica��o do Ita�
            // campo 1
            $banco    = substr($codigo,0,3);
            $moeda    = substr($codigo,3,1);
            $ccc      = substr($codigo,19,3);
            $ddnnum   = substr($codigo,22,2);
            $dv1      = self::modulo_10($banco.$moeda.$ccc.$ddnnum);
            // campo 2
            $resnnum  = substr($codigo,24,6);
            $dac1     = substr($codigo,30,1);//modulo_10($agencia.$conta.$carteira.$nnum);
            $dddag    = substr($codigo,31,3);
            $dv2      = self::modulo_10($resnnum.$dac1.$dddag);
            // campo 3
            $resag    = substr($codigo,34,1);
            $contadac = substr($codigo,35,6); //substr($codigo,35,5).modulo_10(substr($codigo,35,5));
            $zeros    = substr($codigo,41,3);
            $dv3      = self::modulo_10($resag.$contadac.$zeros);
            // campo 4
            $dv4      = substr($codigo,4,1);
            // campo 5
            $fator    = substr($codigo,5,4);
            $valor    = substr($codigo,9,10);
            
            $campo1 = substr($banco.$moeda.$ccc.$ddnnum.$dv1,0,5) . '.' . substr($banco.$moeda.$ccc.$ddnnum.$dv1,5,5);
            $campo2 = substr($resnnum.$dac1.$dddag.$dv2,0,5) . '.' . substr($resnnum.$dac1.$dddag.$dv2,5,6);
            $campo3 = substr($resag.$contadac.$zeros.$dv3,0,5) . '.' . substr($resag.$contadac.$zeros.$dv3,5,6);
            $campo4 = $dv4;
            $campo5 = $fator.$valor;
            
            return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
    }



	private function modulo_10($num) { 
            $numtotal10 = 0;
            $fator = 2;
    
            // Separacao dos numeros
            for ($i = strlen($num); $i > 0; $i--) {
                // pega cada numero isoladamente
                $numeros[$i] = substr($num,$i-1,1);
                // Efetua multiplicacao do numero pelo (falor 10)
                // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Ita�
                $temp = $numeros[$i] * $fator; 
                $temp0=0;
                foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
                $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
                // monta sequencia para soma dos digitos no (modulo 10)
                $numtotal10 += $parcial10[$i];
                if ($fator == 2) {
                    $fator = 1;
                } else {
                    $fator = 2; // intercala fator de multiplicacao (modulo 10)
                }
            }
            
            // v�rias linhas removidas, vide fun��o original
            // Calculo do modulo 10
            $resto = $numtotal10 % 10;
            $digito = 10 - $resto;
            if ($resto == 0) {
                $digito = 0;
            }
            
            return $digito;
            
    }


       private function digitoVerificador_barra($numero) {
        $resto2 = self::modulo_11($numero, 9, 1);
        $digito = 11 - $resto2;
         if ($digito == 0 || $digito == 1 || $digito == 10  || $digito == 11) {
            $dv = 1;
         } else {
            $dv = $digito;
         }
         return $dv;
    }




        private function fator_vencimento($data) {
        $data = explode("/",$data);
        $ano = $data[2];
        $mes = $data[1];
        $dia = $data[0];
        return(abs((self::_dateToDays("1997","10","07")) - (self::_dateToDays($ano, $mes, $dia))));
    }
    
	    public function fbarcode($valor){
	    
	        $fino = 1 ;
	        $largo = 3 ;
	        $altura = 50 ;
	    
	        $barcodes[0] = "00110" ;
	        $barcodes[1] = "10001" ;
	        $barcodes[2] = "01001" ;
	        $barcodes[3] = "11000" ;
	        $barcodes[4] = "00101" ;
	        $barcodes[5] = "10100" ;
	        $barcodes[6] = "01100" ;
	        $barcodes[7] = "00011" ;
	        $barcodes[8] = "10010" ;
	        $barcodes[9] = "01010" ;
	        for($f1=9;$f1>=0;$f1--){ 
	            for($f2=9;$f2>=0;$f2--){  
	            $f = ($f1 * 10) + $f2 ;
	            $texto = "" ;
	            for($i=1;$i<6;$i++){ 
	                $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
	            }
	            $barcodes[$f] = $texto;
	            }
	        }
	    
	    
	        //Desenho da barra
	    
	    
	        //Guarda inicial
	        ?><img src="imagens/p.png" width="<?php echo $fino?>" height="<?php echo $altura?>" /><img 
	        src="imagens/b.png" width="<?php echo $fino?>" height="<?php echo $altura?>" /><img 
	        src="imagens/p.png" width="<?php echo $fino?>" height="<?php echo $altura?>" /><img 
	        src="imagens/b.png" width="<?php echo $fino?>" height="<?php echo $altura?>" /><img 
	        <?php
	        $texto = $valor ;
	        if((strlen($texto) % 2) <> 0){
	            $texto = "0" . $texto;
	        }
	    
	        // Draw dos dados
	        while (strlen($texto) > 0) {
	        $i = round(self::esquerda($texto,2));
	        $texto = self::direita($texto,strlen($texto)-2);
	        $f = $barcodes[$i];
	        for($i=1;$i<11;$i+=2){
	            if (substr($f,($i-1),1) == "0") {
	            $f1 = $fino ;
	            }else{
	            $f1 = $largo ;
	            }
	        ?>
	            src="imagens/p.png" width=<?php echo $f1?> height="<?php echo $altura?>" /><img 
	        <?php
	            if (substr($f,$i,1) == "0") {
	            $f2 = $fino ;
	            }else{
	            $f2 = $largo ;
	            }
	        ?>
	            src="imagens/b.png" width=<?php echo $f2?> height="<?php echo $altura?>" /><img 
	        <?php
	        }
	        }
	    
	        // Draw guarda final
	        ?>
	        src="imagens/p.png" width=<?php echo $largo?> height="<?php echo $altura?>" /><img 
	        src="imagens/b.png" width="<?php echo $fino?>" height="<?php echo $altura?>" /><img 
	        src="imagens/p.png" width=<?php echo 1?> height="<?php echo $altura?>" /> 
	        <?php
	}





	?>