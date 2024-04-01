<?php
    require_once("Products.php");
    require_once("DAO.php");
    require_once("Database.php");

    class ProductsDAO extends DAO
    {
        public function create($obj) : ?int
        {
            $sql = "INSERT INTO `products` (`products_id`, `product_name`, `price`) 
                    VALUES ('{$obj->getProducts_id()}','{$obj->getProduct_name()}','{$obj->getPrice()}');";
            $this->database->getPDO()->prepare($sql)->execute();
            $id = $this->database->getPDO()->lastInsertId();
            if (gettype($id) == "string")
            {
                return intval($id);
            }
            return null;
        }
        public function read(int $id) : ?Products
        {
            $sql = "SELECT * FROM `products` WHERE products_id = $id";
            $result= $this->database->getPDO()->prepare($sql);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data)
            {
                return new Products($data["products_id"], $data["product_name"], $data["price"]);
            }
            return Null;
        }
        public function update($obj) : bool
        {
            $sql = "UPDATE `products` SET `product_name`='{$obj->getProduct_name()}', `price`='{$obj->getPrice()}'
                    WHERE `products_id` = '{$obj->getProducts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
        public function delete($obj) : bool
        {
            $sql = "DELETE FROM `products` WHERE `products_id` = '{$obj->getProducts_id()}'";
            return $this->database->getPDO()->prepare($sql)->execute();
        }
    }
    