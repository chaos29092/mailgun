<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index(){
		return View::make('index');
	}

	public function campaigns(){
		return View::make('campaigns');
	}

}
