<?php 

namespace App\src\controllers;

use App\src\core\Application;

/**
 * Class HomeController
 * @package App\src\controllers
 */
class HomeController extends Controller
{

	public function home() {
	    return $this->render('home',[]);
	}
	

}

?>