<?php
    declare(strict_types = 1);

    class Authors {
        private int $authors_id;
        private string $name;
        private string $surname;
        private ?array $books;

        public function __construct(int $authors_id, string $name, string $surname, ?array $books=null){
            $this->authors_id = $authors_id;
            $this->name = $name;
            $this->surname = $surname;
            $this->books= $books;
        }

        public function getAuthors_id(): int{
            return $this->authors_id;
        }

        public function setName(string $new_name): void{
            $this->name = $new_name;
        }

        public function getName(): string{
            return $this->name;
        }

        public function setSurname(string $new_surname): void{
            $this->surname = $new_surname;
        }

        public function getSurname(): string{
            return $this->surname;
        }

        public function getBooks(): array
    {
        return $this->books;
    }


    }