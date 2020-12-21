<?php 

namespace App\src\controllers;

use App\src\core\Application;

class HomeController extends Controller
{

	public function home() {

	    return $this->render('home',[]);
	}
	

}

?>