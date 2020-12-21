<?php


namespace App\src\repository;


use App\src\core\Application;

class MessageRepository extends ModelRepository
{

    /**
     * @return array
     */
    public function getMessage()
    {
        // request the given base to output the last 20 messages
        $statement = Application::$app->db->getPDO()->query("SELECT user.firstName,messages.content,messages.created_at FROM user INNER JOIN messages ON(user.id = messages.author)");

        // processes the results
        $messages = $statement->fetchAll();

        // display data form json
        return $messages;

    }

    /**
     * @param int $author
     * @param string $content
     */
    public function postMessage(int $author, string $content) {
        if(!array_key_exists('author',$_POST) || !array_key_exists('content',$_POST)) {
            return;
        }

        //create request for insert
        $statement = $this->prepare("INSERT INTO messages(author,content) VALUES('".$author."','".$content."')");
        $statement->execute();

    }


}