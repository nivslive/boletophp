<?php

use Dados;

class DadosUsuario extends Dados {

	private array $dados;
        
        private string $quantidade;
        private string $valor_unitario;
        private string $aceite;
        private string $especie;
        private string $especie_doc;




	public function __construct($valor_unitario = '' , $aceite =  '', $especie = 'R$', $especie_doc = ''
         ) {
		        $this->dados['codigo_banco_com_dv'] = self::setCodigoBanco($this->codigo_banco);

        /* Dados padrão */
        $this->dados['valor_unitario'] = setValorUnitario($valor_unitario);
        $this->dados['aceite'] = setAceite($aceite);		
        $this->dados['especie'] = setEspecie($especie);
        $this->dados['especie_doc'] = setEspecieDoc($especie_doc);
	} 


        private function getValorUnitario(){
                return $this->dados['valor_unitario'];
        }

        private function setValorUnitario($valor_unitario):string{
                $this->dados['valor_unitario'] = $valor_unitario;
        }


        
        private function getAceite(){
                return $this->dados['aceite'];
        }

        private function setAceite($aceite):string{
                $this->dados['valor_unitario'] = $aceite;
        }


        private function getEspecie(){
                return $this->dados['aceite'];
        }

        private function setEspecie($especie):string{
                $this->dados['valor_unitario'] = $especie;
        }


        private function getEspecieDoc(){
                return $this->dados['aceite'];
        }

        private function setEspecieDoc($especie_doc):string{
                $this->dados['valor_unitario'] = $especie_doc;
        }

        

}





	?>