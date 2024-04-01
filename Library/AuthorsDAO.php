<?php
    require_once("Authors.php");
    require_once("DAO.php");
    require_once("Database.php");

    class AuthorDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `authors` (`name`, `surname`) 
                    VALUES ('{$obj->getName()}','{$obj->getSurname()}')";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        public function read(int $id) : ?Authors
        {
            $sql = "SELECT * FROM `authors` WHERE authors_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data)
            {
                $books = $this->getBooks($id);
                return new Authors($data["authors_id"], $data["name"], $data["surname"], $books);
            }
            return Null;
        }
        public function update($obj) : bool
        {
            $sql = "UPDATE `authors` SET `name`='{$obj->getName()}', `surname`='{$obj->getSurname()}' 
                    WHERE `authors_id` = '{$obj->getAuthors_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `authors` WHERE `authors_id` = '{$obj->getAuthors_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function linkAuthorToBook(Authors $author, Books $book) : bool
        {
            $sql = "INSERT INTO `authorbooks` (`authors_id`, `books_id`) 
                    VALUES ('{$author->getAuthors_id()}','{$book->getBooks_id()}')";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function unlinkAuthorToBook(Authors $author, Books $book) : bool
        {
            $sql = "DELETE FROM `authorbooks` 
                    WHERE `authors_id` = '{$author->getAuthors_id()}' AND `books_id` = '{$book->getBooks_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function getBooks(int $authors_id) : array
        {
            $sql = "SELECT `books`.* FROM `books` 
                    INNER JOIN `authorbooks` ON `authorbooks`.`books_id` = `books`.`books_id` 
                    WHERE `authorbooks`.`authors_id` = '{$authors_id}'";
            $query = $this->database->getPDO()->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $books = array();
            foreach ($result as $row)
            {
                $books[] = new Books($row["books_id"], $row["title"], $row["publication_year"], $row["isbn"]);
            }
            return $books;
        }
    }
