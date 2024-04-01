<?php
    require_once("Posts.php");
    require_once("DAO.php");
    require_once("Database.php");

    class PostsDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $date = $obj->getDate();
            $sql = "INSERT INTO `posts` (`posts_id`, `headline`, `text`, `date`) 
                    VALUES ('{$obj->getPosts_id()}','{$obj->getHeadline()}','{$obj->getText()}','$date');";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        public function read(int $id) : ?Posts
        {
            $sql = "SELECT * FROM `posts` WHERE posts_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data)
            {
                return new Posts($data["posts_id"], $data["headline"], $data["text"], $data["date"]);
            }
            return Null;
        }
        public function update($obj) : bool
        {
            $date = $obj->getDate();
            $sql = "UPDATE `posts` SET `headline`='{$obj->getHeadline()}', `text`='{$obj->getText()}', `date`='$date'
                    WHERE `posts_id` = '{$obj->getPosts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `posts` WHERE `posts_id` = '{$obj->getPosts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
