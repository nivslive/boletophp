<?php

class Route {
	
	public function __construct() {
		integrate();
	}

	public static function integrate($model, $view, $controller){
	include "../../Models/".$model;
	include "../../Controllers/".$controller;
	include "../../Views/".$view;

}
}


?>