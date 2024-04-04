<?php
    require_once("Orders.php");
    require_once("../DAO.php");
    require_once("../Database.php");

    class OrdersDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `orders` (`orders_id`, `product_num`, `date`) 
                    VALUES ('{$obj->getOrders_id()}','{$obj->getProduct_num()}','{$obj->getDate()}');";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        public function read(int $id) : ?Orders
        {
            $sql = "SELECT * FROM `orders` WHERE orders_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data)
            {
                return new Orders($data["orders_id"], $data["product_num"], $data["date"]);
            }
            return Null;
        }
        public function update($obj) : bool
        {
            $sql = "UPDATE `orders` SET `product_num`='{$obj->getProduct_num()}', `date`='{$obj->getDate()}'
                    WHERE `orders_id` = '{$obj->getOrders_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `orders` WHERE `orders_id` = '{$obj->getOrders_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
    