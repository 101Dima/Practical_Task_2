<?php 
    declare(strict_types=1);
    require_once("DAO.php");
    require_once("Database.php");
    require_once("Grades.php");

    class GradeDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `grades` (`students_id`, `subjects_id`, `grade`) 
                    VALUES ('{$obj->getStudents_id()}', '{$obj->getSubjects_id()}', '{$obj->getGrade()}')";
            $this->database->getPDO()->prepare($sql)->execute();

            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string") {
                return intval($id);
            }
            return null;
        }

        public function read(int $id) : ?Grades
        {
            $sql = "SELECT * FROM `grades` WHERE grades_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Grades($data["grades_id"], $data["students_id"], $data["subjects_id"], $data["grade"]);
            }
            return null;
        }

        public function update($obj) : bool
        {
            $sql = "UPDATE `grades` SET `grade`='{$obj->getGrade()}' WHERE `grades_id` = '{$obj->getGrades_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `grades` WHERE `grades_id` = '{$obj->getGrades_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
    