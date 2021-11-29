<?php

use Dados;

class DadosUsuario extends Dados {

	private array $dados;
        private string $quantidade;
        private string $valor_unitario;
        private string $aceite;
        private string $especie;
        private string $especie_doc;




	public function __construct($valor_unitario
         ) {
		        $this->dados['codigo_banco_com_dv'] = self::setCodigoBanco($this->codigo_banco);

        /* Dados padrão */
        $this->dados['valor_unitario'] = setValorUnitario($valor_unitario);
        $this->dados['aceite'] = '';		
        $this->dados['especie'] = 'R$';
        $this->dados['especie_doc'] = '';
	} 

        private function getValorUnitario(){
                return $this->dados['valor_unitario'];
        }

        private function setValorUnitario($valor_unitario):string{
                $this->dados['valor_unitario'] = $valor_unitario;
        }

}





	?>