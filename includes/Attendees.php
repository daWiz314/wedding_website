<?php

    class Attendee {
        private $_data = [
            'id' => 0, //ID for database
            'attending' => false, // Bool for attending
            'po' => false, // Bool for plus one
            'f_name' => "", // String for first name
            'l_name' => "", // String for last name
            'email' => "", // String for email
            'po_f_name' => "", // String for plus one first name
            'po_l_name' => "", // string for plus one second name
            'code' => "spam", // Code so we can filter actual users and bots/spam
        ];
        
        public function __construct(array $data, int $id) {
            $this -> _data["id"] = $id;
            $data = $this -> _fix_data($data);
            $this -> _set_up_data($data);
        }

        // Make sure the array $data has all the stuff with no displayed warnings
        private function _fix_data(array $data) {
            foreach($this->_data as $key => $_) {
                if (isset($data[$key])) {
                    continue;
                } else {
                    $data[$key] = $this -> _data[$key]; // If data is missing, set it to default value
                }
            }
            return $data;
        }

        private function _set_up_data(array $data) {
            foreach($this->_data as $key => $_) {
                if ($key == 'id') {
                    continue;
                }
                $this->_data[$key] = $data[$key];
            }
            unset($data);
            unset($_POST);
        }

        public function get_data() {
            return $this->_data;
        }

        public function get_placeholders() {
            $return_this = [];
            foreach($this->_data as $key=>$value) {
                $return_this[$key] = $value;
            }
            return $return_this;
        }
    }
    
?>