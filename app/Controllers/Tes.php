<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tes extends BaseController
{
	public function index()
	{
		$data['title']	= 'Halaman Home Admin';
		echo view('layout/header', $data);
		echo view('layout/sidebar');
		echo view('main');
		echo view('layout/footer');
	}
}
