<?php
    declare(strict_types = 1);

    class Comments {
        private int $comments_id;
        private string $text;
        private string $date;
        private string $author;

        public function __construct(int $comments_id, string $text, string $date, string $author){
            $this->comments_id = $comments_id;
            $this->text = $text;
            $this->date = $date;
            $this->author = $author;
        }

        public function getComments_id(): int{
            return $this->comments_id;
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

        public function setAuthor(string $new_author): void{
            $this->author = $new_author;
        }

        public function getAuthor(): string{
            return $this->author;
        }

    }

