<?php 
    declare(strict_types=1);
    require_once("DAO.php");
    require_once("Database.php");
    require_once("Contacts.php");

    class ContactsDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `contacts` (`name`, `surname`, `gm_address`, `telephone_num`) 
                    VALUES ('{$obj->getName()}', '{$obj->getSurname()}', '{$obj->getGm_address()}', '{$obj->getTelephone_num()}')";
            $this->database->getPDO()->prepare($sql)->execute();

            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string") {
                return intval($id);
            }
            return null;
        }

        public function read(int $id) : ?Contacts
        {
            $sql = "SELECT * FROM `contacts` WHERE contacts_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Contacts($data["contacts_id"], $data["name"], $data["surname"], $data["gm_address"], $data["telephone_num"]);
            }
            return null;
        }

        public function update($obj) : bool
        {
            $sql = "UPDATE `contacts` SET `name`='{$obj->getName()}', `surname`='{$obj->getSurname()}', 
                                        `gm_address`='{$obj->getGm_address()}', `telephone_num`='{$obj->getTelephone_num()}' 
                    WHERE `contacts_id` = '{$obj->getContacts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }

        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `contacts` WHERE `contacts_id` = '{$obj->getContacts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
    