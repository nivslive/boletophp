<?php

use Dados;

class DadosBanco extends Dados {



	private string $codigo_banco;
	private string $moeda;
	private string $fator_vencimento;


	public function __construct() {

		$this->codigo_banco = '';
		$this->moeda = '';
		$this->fator_vencimento = '';
	}


}


	?>
