<?php

class DadosGerais {
    
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc). ATT NIVAN_JR: Aplique os retornos de dados do BD no Constructor.	//

// DADOS DO BOLETO PARA O SEU CLIENTE

public string $dados_boleto;

public int $prazo_pagamento_dias;

public float $taxa_boleto;

public string $data_venc;

// Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;	
public string $valor_cobrado;

// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
public string $valor_boleto;



    
    public function __construct ($dados_boleto = '', 
													$prazo_pagamento_dias = '', 
													$taxa_boleto = 0.0,
													$data_venc = '',
													$valor_cobrado = '',
													$valor_boleto = ''
													){

		//DADOS ÚNICOS DO BOLETO
		$this->dados_boleto = $dados_boleto;
		$this->prazo_pagamento_dias = $prazo_pagamento_dias;
		$this->taxa_boleto = $taxa_boleto;
		$this->data_venc = setDataVenc($prazo_pagamento_dias);
		$this->valor_cobrado = $valor_cobrado;
		$this->valor_boleto  = $valor_boleto;

    }

    private function getDataVenc(){
		return $this->data_venc = $data_venc;
	}

	private function setDataVenc($prazo_pagamento_dias){
		return $data_venc = date("d/m/Y", time() + ($prazo_pagamento_dias * 86400));
	}


}