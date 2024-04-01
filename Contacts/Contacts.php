<?php
    declare(strict_types = 1);
    
    class Contacts {
        private int $contacts_id;
        private string $name;
        private string $surname;
        private string $gm_address;
        private string $telephone_num;

        public function __construct(int $contacts_id, string $name, string $surname, string $gm_address, $telephone_num){
            $this->contact_id = $contact_id;
            $this->name = $name;
            $this->surname = $surname;
            $this->gm_address = $gm_address;
            $this->telephone_num = $telephone_num;
        }
        
        public function getContacts_id(): int{
            return $this->contacts_id;
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

        public function setGm_address(string $new_gm_address): void{
            $this->gm_address = $new_gm_address;
        }

        public function getGm_address(): string{
            return $this->gm_address;
        }

        public function setTelephone_num(string $new_telephone_num): void{
            $this->telephone_num = $new_telephone_num;
        }

        public function getTelephone_num(): string{
            return $this->telephone_num;
        }


    }

    