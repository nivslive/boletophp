<?php

class ConfigRoutes() {
	
	public function __construct() {
		$this->integrate();
	}

	public function integrate($model, $view, $controller){
	include "../Models/".$model;
	include "../Controllers/".$controller;
	include "../Views/".$view;

}
	?>