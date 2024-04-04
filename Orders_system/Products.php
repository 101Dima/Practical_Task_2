<?php
    declare(strict_types = 1);

    class Products {
        private int $products_id;
        private string $product_name;
        private int $price;

        public function __construct(int $products_id, string $product_name, int $price){
            $this->products_id = $products_id;
            $this->product_name = $product_name;
            $this->price = $price;
        }

        public function getProducts_id(): int{
            return $this->products_id;
        }

        public function setProduct_name(string $new_product_name): void{
            $this->product_name = $new_product_name;
        }

        public function getProduct_name(): string{
            return $this->product_name;
        }

        public function setPrice(int $new_price): void{
            $this->price = $new_price;
        }

        public function getPrice(): int{
            return $this->price;
        }
        

    }