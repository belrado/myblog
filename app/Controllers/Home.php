<?php 
namespace App\Controllers;

use App\Models\NewsModel;
use App\ThirdParty\Markdown as mk;
//use CodeIgniter\Controller;

class Home extends BaseController
{
	public function index()
	{
		$model = new NewsModel();

		$logger = service('logger');
		
		print_r($logger);

		//new mk();
		//myname('Hi Berlado');
		//print_r($model->getTest());
		//exit;
		//new Markdown();
		//return view('welcome_message');
	}


	//--------------------------------------------------------------------

}
