<?php
    declare(strict_types = 1);

    class Students {
        private int $students_id;
        private string $name;
        private string $surname;
        private string $group;
        private ?array $grades;

        public function __construct(int $students_id, string $name, string $surname, string $group, array $grades=null){
            $this->students_id = $students_id;
            $this->name = $name;
            $this->surname = $surname;
            $this->group = $group;
            $this->grades = $grades;
        }

        public function getStudents_id(): int{
            return $this->students_id;
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

        public function setGroup(string $new_group): void{
            $this->group = $new_group;
        }

        public function getGroup(): string{
            return $this->group;
        }

        public function getGrades(): ?array
        {
            return $this->grades;
        }

        
    }