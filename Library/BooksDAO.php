<?php
    require_once("Books.php");
    require_once("DAO.php");
    require_once("Database.php");

    class BooksDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `books` (`title`, `publication_year`, `isbn`) 
                    VALUES ('{$obj->getTitle()}','{$obj->getPublication_year()}','{$obj->getIsbn()}')";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        public function read(int $id) : ?Books
        {
            $sql = "SELECT * FROM `books` WHERE books_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data)
            {
                $authors = $this->getAuthors($id);
                return new Books($data["books_id"], $data["title"], $data["publication_year"], $data["isbn"], $authors);
            }
            return Null;
        }
        public function update($obj) : bool
        {
            $sql = "UPDATE `books` SET `title`='{$obj->getTitle()}', `publication_year`='{$obj->getPublication_year()}', `isbn`='{$obj->getIsbn()}' 
                    WHERE `books_id` = '{$obj->getBooks_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `books` WHERE `books_id` = '{$obj->getBooks_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function linkBookToAuthor(Books $book, Authors $author) : bool
        {
            $sql = "INSERT INTO `authorbooks` (`authors_id`, `books_id`) 
                    VALUES ('{$author->getAuthors_id()}','{$book->getBooks_id()}')";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function unlinkBookToAuthor(Books $book, Authors $author) : bool
        {
            $sql = "DELETE FROM `authorbooks` 
                    WHERE `books_id` = '{$book->getBooks_id()}' AND `authors_id` = '{$author->getAuthors_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function getAuthors(int $books_id) : array
        {
            $sql = "SELECT `authors`.* FROM `authors` 
                    INNER JOIN `authorbooks` ON `authorbooks`.`authors_id` = `authors`.`authors_id` 
                    WHERE `authorbooks`.`books_id` = '{$books_id}'";
            $query = $this->database->getPDO()->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $authors = array();
            foreach ($result as $row)
            {
                $authors[] = new Authors($row["authors_id"], $row["name"], $row["surname"]);
            }
            return $authors;
        }
    }
    