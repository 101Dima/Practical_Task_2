<?php
    declare(strict_types = 1);

    class Posts {
        private int $posts_id;
        private string $headline;
        private string $text;
        private string $date;

        public function __construct(int $posts_id, string $headline, string $text, string $date){
            $this->posts_id = $posts_id;
            $this->headline = $headline;
            $this->text = $text;
            $this->date = $date;
        }

        public function getPosts_id(): int{
            return $this->posts_id;
        }

        public function setHeadline(string $new_headline): void{
            $this->headline = $new_headline;
        }

        public function getHeadline(): string{
            return $this->headline;
        }

        public function setText(string $new_text): void{
            $this->text = $new_text;
        }

        public function getText(): string{
            return $this->text;
        }

        public function setDate(string $new_date): void{
            $this->date = $new_date;
        }
        
        public function getDate(): string{
            return $this->date;
        }


    }