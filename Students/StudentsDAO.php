<?php 
    declare(strict_types=1);
    require_once("Students.php");
    require_once("../DAO.php");
    require_once("../Database.php");

    class StudentsDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `students` (`name`, `surname`, `group`) 
                    VALUES ('{$obj->getName()}', '{$obj->getSurname()}', '{$obj->getGroup()}')";
            $this->database->getPDO()->prepare($sql)->execute();

            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string") {
                return intval($id);
            }
            return null;
        }

        public function read(int $id) : ?Students
        {
            $sql = "SELECT * FROM `students` WHERE students_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Students($data["students_id"], $data["name"], $data["surname"], $data["group"]);
            }
            return null;
        }

        public function update($obj) : bool
        {
            $sql = "UPDATE `students` SET `name`='{$obj->getName()}', `surname`='{$obj->getSurname()}', 
                                        `group`='{$obj->getGroup()}' WHERE `students_id` = '{$obj->getStudents_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `students` WHERE `students_id` = '{$obj->getStudents_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public  function getGrades(int $id) : array
       {
            $sql = "SELECT `grades`.*
                    FROM `grades` 
                    INNER JOIN `students` ON `students`.`students_id` = `grades`.`students_id` 
                    WHERE `grades`.`students_id` = '{$id}';";
            $result = $this->database->getPDO()->prepare($sql);
            $result->execute();
            $result = $result->fetchAll();
            $grades = array();
            foreach ($result as $grade)
            {
                $grades[] = new Grades($grade["grades_id"],$grade["students_id"],$grade["subjects_id"],$grade["grade"]);
            }
            return $grades;
        }
    }