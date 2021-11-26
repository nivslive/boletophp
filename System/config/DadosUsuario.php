<?php

use Dados;

class DadosUsuario extends Dados {

	private array $dados = [];


	public function __construct() {
		        $this->dados['codigo_banco_com_dv'] = self::setCodigoBanco($this->codigo_banco);

        /* Dados padrão */
        $this->dados['quantidade'] = '';
        $this->dados['valor_unitario'] = '';
        $this->dados['aceite'] = '';		
        $this->dados['especie'] = 'R$';
        $this->dados['especie_doc'] = '';
	} 


}





	?>