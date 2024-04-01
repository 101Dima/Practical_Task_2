<?php 
    declare(strict_types=1);
    require_once("DAO.php");
    require_once("Database.php");
    require_once("Subjects.php");

    class SubjectDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `subjects` (`subject`, `teacher`) 
                    VALUES ('{$obj->getSubject()}', '{$obj->getTeacher()}')";
            $this->database->getPDO()->prepare($sql)->execute();

            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string") {
                return intval($id);
            }
            return null;
        }

        public function read(int $id) : ?Subjects
        {
            $sql = "SELECT * FROM `subjects` WHERE subjects_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Subjects($data["subjects_id"], $data["subject"], $data["teacher"]);
            }
            return null;
        }

        public function update($obj) : bool
        {
            $sql = "UPDATE `subjects` SET `subject`='{$obj->getSubject()}', `teacher`='{$obj->getTeacher()}' 
                    WHERE `subjects_id` = '{$obj->getSubjects_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `subjects` WHERE `subjects_id` = '{$obj->getSubjects_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
