<?php
    require_once("Comments.php");
    require_once("../DAO.php");
    require_once("../Database.php");

    class CommentsDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $date = $obj->getDate();
            $sql = "INSERT INTO `comments` (`comments_id`, `text`, `date`, `author`) 
                    VALUES ('{$obj->getComments_id()}','{$obj->getText()}','$date','{$obj->getAuthor()}');";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        
        public function read(int $id) : ?Comments
        {
            $sql = "SELECT * FROM `comments` WHERE comments_id = $id";
            $result = $this->database->getPDO()->query($sql);

            if ($result) {
                $data = $result->fetch(PDO::FETCH_ASSOC);
                if ($data) {
                    return new Comments($data["comments_id"], $data["text"], $data["date"], $data["author"]);
                }
            }
            return null;
        }
        
        public function update($obj) : bool
        {
            $date = $obj->getDate();
            $sql = "UPDATE `comments` SET `text`='{$obj->getText()}', `date`='$date', `author`='{$obj->getAuthor()}'
                    WHERE `comments_id` = '{$obj->getComments_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `comments` WHERE `comments_id` = '{$obj->getComments_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
