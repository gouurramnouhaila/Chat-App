<?php


namespace App\src\controllers;


use App\src\core\Request;
use App\src\Factory\MessageFactory;
use App\src\Factory\UserFactory;
use App\src\models\Message;
use App\src\repository\MessageRepository;

/**
 * Class MessageController
 * @package App\src\controllers
 */
class MessageController extends Controller
{

    /**
     * @param Request $request
     */
    public function chat(Request $request) {

            if($request->isPost()) {
                $this->postChat();
            }

            return $this->render('chat',[]);

    }

    /**
     * get All messages and convert messages to json
     */
    public function getChat() {
        $messageRepository = $this->getRepository();
            echo json_encode($messageRepository->getMessage());

    }

    /**
     * insert message from user connect
     */
    public function postChat() {
        $messageRepository = $this->getRepository();
        $messageRepository->postMessage($_POST['author'],$_POST['content']);
    }

    /**
     * @return MessageRepository
     * Create Object from MessageRepository
     */
    public function getRepository() {
        $repository =  new MessageFactory();
        return $repository->doFactory();
    }



}