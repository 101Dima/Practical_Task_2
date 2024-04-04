<?php
    declare(strict_types = 1);

    class Books {
        private int $books_id;
        private string $title;
        private int $publication_year;
        private string $isbn;
        private ?array $authors;

        public function __construct(int $books_id, string $title, int $publication_year, string $isbn, ?array $authors=null){
            $this->books_id = $books_id;
            $this->title = $title;
            $this->publication_year = $publication_year;
            $this->isbn = $isbn;
            $this->authors = $authors;
        }

        public function getBooks_id(): int{
            return $this->books_id;
        }

        public function setTitle(string $new_title): void{
            $this->title = $new_title;
        }

        public function getTitle(): string{
            return $this->title;
        }

        public function setPublication_year(int $new_publication_year): void{
            $this->publication_year = $new_publication_year;
        }

        public function getPublication_year(): int{
            return $this->publication_year;
        }

        public function setIsbn(string $new_isbn): void{
            $this->isbn = $new_isbn;
        }

        public function getIsbn(): string{
            return $this->isbn;
        }

        public function getAuthors(): array
    {
        return $this->authors;
    }

        
    }