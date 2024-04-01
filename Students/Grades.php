<?php
    declare(strict_types = 1);

    class Grades {
        private int $grades_id;
        private int $students_id;
        private int $subjects_id;
        private int $grade;

        public function __construct(int $grades_id, int $students_id, int $subjects_id, int $grade){
            $this->grades_id = $grades_id;
            $this->students_id = $students_id;
            $this->subjects_id = $subjects_id;
            $this->grade = $grade;
        }

        public function getGrades_id(): int{
            return $this->grades_id;
        }

        public function getStudents_id(): int{
            return $this->students_id;
        }

        public function getSubjects_id(): int{
            return $this->subjects_id;
        }

        public function getGrade(): int{
            return $this->grade;
        }

        public function setGrade(int $new_grade): void{
            $this->grade = $new_grade;
        }

        
    }