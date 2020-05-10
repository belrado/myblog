<?php 
namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
	public function index()
	{
		$model = new NewsModel();
		print_r($model->getTest());
		exit;
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
