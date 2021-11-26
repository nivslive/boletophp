<?php


namespace config;

//DADOS GERAIS DO BOLETO
use InfosBoleto;


//ASPECTOS GERAIS DO BOLETO
use DadosUsuario;
use DadosBanco;
use CodigoDeBarras;
use FormatarValores;


class Boleto extends InfosBoleto {

//CREDITOS OFICIAIS
// EM CREDITOSOFICIAIS.TXT



// ESTUDO DE ORIENTAÇÃO EM OBJETOS
// BY NIVANJR
// NO OPENSOURCE LINDO FEITO PELOS BRS: BOLETOPHP
// Obrigado!



// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc). ATT NIVAN_JR: Aplique os retornos de dados do BD no Constructor.	//

// DADOS DO BOLETO PARA O SEU CLIENTE
	
	public int $prazo_pagamento_dias;
	



	public float $taxa_boleto;



	public string $data_venc;
	


	// Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;	
	public string $valor_cobrado;

	// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	public string $valor_boleto;



	public function __construct(){

		//DADOS ÚNICOS DO BOLETO
		$this->dados_boleto = $dados_boleto;
		$this->prazo_pagamento_dias = $prazo_pagamento_dias;
		$this->taxa_boleto = $taxa_boleto;
		$this->data_venc = setDataVenc($prazo_pagamento_dias);
		$this->valor_cobrado = $valor_cobrado;
		$this->valor_boleto  = $valor_boleto;


		//ASPECTOS GERAIS DO BOLETO

		$this->DadosUsuario = new DadosUsuario;
		$this->DadosBanco = new DadosBanco;
		$this->CodigoDeBarras = new CodigoDeBarras;
		$this->FormatarValores = new FormatarValores;

	}

	private function getDataVenc(){
		return $this->data_venc = $data_venc;
	}

	private function setDataVenc($prazo_pagamento_dias){
		return $data_venc = date("d/m/Y", time() + ($prazo_pagamento_dias * 86400));
	}







}




?>