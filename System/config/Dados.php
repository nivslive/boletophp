<?php




class Dados {

	private string $dados;

	public function __construct(){
		$this->dados = setDados();
	}

	   public function getDados()
    {
        return $this->dados = [];
    }


	 private function setDados(array $dados)
    {
        foreach($dados as $key => $value) {
            $this->dados[$key] = $value;
        }
    }

}



?>