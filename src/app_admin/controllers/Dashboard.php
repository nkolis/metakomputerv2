<?php

namespace Metakomputer\Admin\controllers;

use Metakomputer\core\Controller;

class Dashboard extends Controller {

	public function index(){
		$model = [
			'title' => 'Dashboard',
			'nama' => 'Nur Kholis Setiawan'
		];
		$this->view('app_admin', 'dashboard', $model);
	}

}