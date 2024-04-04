<?php
    declare(strict_types = 1);

    class Subjects {
        private int $subjects_id;
        private string $subject;
        private string $teacher;

        public function __construct(int $subjects_id, string $subject, string $teacher){
            $this->subjects_id = $subjects_id;
            $this->subject = $subject;
            $this->teacher = $teacher;
        }

        public function getSubjects_id(): int{
            return $this->subjects_id;
        }

        public function setSubject(string $new_subject): void{
            $this->subject = $new_subject;
        }

        public function getSubject(): string{
            return $this->subject;
        }

        public function setTeacher(string $new_teacher): void{
            $this->teacher = $new_teacher;
        }

        public function getTeacher(): string{
            return $this->teacher;
        }

        
    }