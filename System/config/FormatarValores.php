<?php

	class FormatarValores {

		private function formata_numero($numero,$loop,$insert,$tipo = "geral") {
        if ($tipo == "geral") {
            $numero = str_replace(",","",$numero);
            while(strlen($numero)<$loop){
                $numero = $insert . $numero;
            }
        }
        if ($tipo == "valor") {
            /*
            retira as virgulas
            formata o numero
            preenche com zeros
            */
            $numero = str_replace(",","",$numero);
            while(strlen($numero)<$loop){
                $numero = $insert . $numero;
            }
        }
        if ($tipo == "convenio") {
            while(strlen($numero)<$loop){
                $numero = $numero . $insert;
            }
        }
        return $numero;
    }

    private function formatarValores()
    {
        //valor tem 10 digitos, sem virgula
        $this->valor_final = self::formata_numero($this->dados["valor_boleto"],10,0,"valor");
        //agencia � 4 digitos
        $this->agencia = self::formata_numero($this->dados["agencia"],4,0);
        //conta � 5 digitos + 1 do dv
        $this->conta = self::formata_numero($this->dados["conta"],5,0);
        $this->conta_dv = self::formata_numero($this->dados["conta_dv"],1,0);
        //carteira 175
        $this->carteira = $this->dados["carteira"];
        //nosso_numero no maximo 8 digitos
        $this->nnum = self::formata_numero($this->dados["nosso_numero"],8,0);
    }

	}



	?>