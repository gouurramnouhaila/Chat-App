<?php

namespace App\src\controllers;

use App\src\core\Request;
use App\src\Factory\UserFactory;
use App\src\repository\UserRepository;


/**
 * Class LoginController
 * @package App\src\controllers
 */
class LoginController extends Controller {

    /**
     * @var UserRepository
     */
    private $userRepository;




    /**
     * @param Request $request
     */
    public function signIn(Request $request) {
        $userRepository = $this->getRepository();

        if($this->loadDataFromPost($request)) {

            // if login function equal true then user connect
            if($userRepository->login($_POST['email'],$_POST['password'])) {
                session_start();
                // user connect information
                $user = $userRepository->findOne($_POST['email']);
                // Session equal user id connect
                $_SESSION["id_user"] = $user->id;

                return $this->render('startChat',[]);
            }
            else {
                $_SESSION["errorMessage"] = "Wrong email or password";
            }
        }
       return $this->render('sign_in',[]);
    }

    /**
     * @param Request $request
     */
    public function signUp(Request $request) {
        $userRepository = $this->getRepository();
        if($this->loadDataFromPost($request)) {

           // the error message coming from the function validate
           $displayError = $userRepository->validate($_POST['confirmPassword'],$_POST['password']);

           if($displayError === "" && $userRepository->submitted()) {
                return $this->render('sign_in',[]);
           }
           else {
               return $this->render('sign_up',[
                   'error' => $displayError
               ]);
           }
        }
        return $this->render('sign_up',[]);
    }

    /**
     * @param Request $request
     * @return bool
     * function for charge data coming from the post method
     */
    public function loadDataFromPost(Request $request): bool {
        $userRepository = $this->getRepository();
        if($request->isPost()) {
            $userRepository->loadData($request->getBody());
            return true;
        }
        return false;
    }

    /**
     * @return UserRepository
     * Create Object from UserRepository
     */
    public function getRepository() {
        $repository =  new UserFactory();
        return $repository->doFactory();
    }


}