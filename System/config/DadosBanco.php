<?php

use Dados;

class DadosBanco extends Dados {



	private string $codigo_banco;
	private string $moeda;
	private string $fator_vencimento;


	public function __construct( $codigo_banco = '', 
													 $moeda = '', 
													 $fator_vencimento = '') {

		$this->codigo_banco = $codigo_banco;
		$this->moeda = $moeda;
		$this->fator_vencimento = $fator_vencimento;
	}


}


	?>
