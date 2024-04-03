<?php
    declare(strict_types = 1);

    class Orders {
        private int $orders_id;
        private int $product_num;
        private string $date;

        public function __construct(int $orders_id, int $product_num, string $date){
            $this->orders_id = $orders_id;
            $this->product_num = $product_num;
            $this->date = $date;
        }

        public function getOrders_id(): int{
            return $this->orders_id;
        }

        public function setProduct_num(int $new_product_num): void{
            $this->product_num = $new_product_num;
        }

        public function getProduct_num(): int{
            return $this->product_num;
        }

        public function setDate(string $new_date): void{
            $this->date = $new_date;
        }

        public function getDate(): string{
            return $this->date;
        }

    
    }