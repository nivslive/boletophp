<?php


namespace config;

//DADOS GERAIS DO BOLETO
use InfosBoleto;


//ASPECTOS GERAIS DO BOLETO
use DadosGerais;
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




	public function __construct(){
		//ASPECTOS GERAIS DO BOLETO
		$this->DadosGerais = new DadosGerais;
		$this->DadosUsuario = new DadosUsuario;
		$this->DadosBanco = new DadosBanco;
		$this->CodigoDeBarras = new CodigoDeBarras;
		$this->FormatarValores = new FormatarValores;

	}









}




?>