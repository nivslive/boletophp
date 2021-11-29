<?php
$boleto = new Boleto;


// DADOS GERAIS
$boleto->DadosGerais(
        
        // $dados_boleto = string 
            '20,0',
        // $prazo_pagamento_dias = string
            '4 dias',
        // $taxa_boleto = float 
            1.2,
        // $data_venc = string
            '4/2/2020',
        // $valor_cobrado = string
            '42,0',
        //$valor_boleto = string
            '20,2'
        
        );




$boleto->DadosBanco(
        
        // $dados_banco = string 
            '20,0',
        // $moeda = string
            'R$',
        // $fator_vencimento  = string
            '?'
            
        );



$boleto->DadosUsuario();




$dados = $Boleto->dados_boleto;
$taxa_boleto = $boleto->taxa_boleto;
$valor_boleto = $boleto->valor_boleto;



$dados["inicio_nosso_numero"] = "24";  // 24 - Padrão da Caixa Economica Federal

$dados["nosso_numero"] = "19525086";  // Nosso numero sem o DV - REGRA: Máximo de 8 caracteres!

$dados["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento

$dados["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA

$dados["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto

$dados["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)

$dados["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dados["sacado"] = "Nome do seu Cliente";
$dados["endereco1"] = "Endereço do seu Cliente";
$dados["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dados["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
$dados["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dados["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";

// INSTRUÇÕES PARA O CAIXA
$dados["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dados["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dados["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
$dados["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dados["quantidade"] = "";
$dados["valor_unitario"] = "";
$dados["aceite"] = "";		
$dados["especie"] = "R$";
$dados["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - CEF
$dados["agencia"] = "1565"; // Num da agencia, sem digito
$dados["conta"] = "13877"; 	// Num da conta, sem digito
$dados["conta_dv"] = "4"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dados["conta_cedente"] = "87000000414"; // ContaCedente do Cliente, sem digito (Somente Números)
$dados["conta_cedente_dv"] = "3"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "SR";  // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dados["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
$dados["cpf_cnpj"] = "";
$dados["endereco"] = "Coloque o endereço da sua empresa aqui";
$dados["cidade_uf"] = "Cidade / Estado";
$dados["cedente"] = "Coloque a Razão Social da sua empresa aqui";




