<?php 

namespace App\src\controllers;


/**
 * Class HomeController
 * @package App\src\controllers
 */
class HomeController extends Controller
{
    /**
     *
     */
	public function home() {
	    return $this->render('home',[]);
	}
	

}

?>