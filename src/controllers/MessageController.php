<?php


namespace App\src\controllers;


use App\src\core\Request;
use App\src\models\Message;
use App\src\repository\MessageRepository;

class MessageController extends Controller
{
    /**
     * @var MessageRepository
     */
    private $messageRepository;

    /**
     * @param MessageRepository
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

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
            echo json_encode($this->messageRepository->getMessage());

    }

    /**
     * insert message from user connect
     */
    public function postChat() {
            $this->messageRepository->postMessage($_POST['author'],$_POST['content']);

    }



}