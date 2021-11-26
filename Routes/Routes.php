<?php
namespace config;
use Route;

//Unir os arquivos MVC por meio de uma rota.



//ROTA ITAÚ
Route::integrate("Itau", "ItauLayout", "ItauController");

//ROTA SANTANDER
//Route::integrate("SantanderDados", "SantanderLayout", "SantanderController");


//ROTA UNIBANCO
//Route::integrate("UnibancoDados", "UnibancoLayout", "UnibancoController");

