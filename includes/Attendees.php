<?php

    class Attendee {
        private $_data = [
            'attending' => false, // Bool for attending
            'po' => false, // Bool for plus one
            'f_name' => "", // String for first name
            'l_name' => "", // String for last name
            'email' => "", // String for email
            'po_f_name' => "", // String for plus one first name
            'po_l_name' => "", // string for plus one second name
            'code' => "spam", // Code so we can filter actual users and bots/spam
        ];
        
        public function __construct(array $data) {
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
                $this->_data[$key] = $data[$key];
            }
            if (array_key_exists('at_yes', $data)) {
                if ($data['at_yes']) {
                    $this->_data['attending'] = true;
                }
            }
            if (array_key_exists('po_yes', $data)) {
                if ($data['po_yes']) {
                    $this->_data['po'] = true;
                }
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

        public function is_attending() {
            return $this->_data['attending'];
        }

        public function has_po() {
            return $this->_data['po'];
        }

        public function is_attending_string() {
            if ($this->_data['attending']) {
                return "Yes";
            } else {
                return "No";
            }
        }

        public function has_po_string() {
            if ($this->_data['po']) {
                return "Yes";
            } else {
                return "No";
            }
        }

        public function get_full_name() {
            return $this->_data['f_name'] . " " . $this->_data['l_name'];
        }

        public function get_email() {
            return $this->_data['email'];
        }

        public function get_po_name() {
            return $this->_data['po_f_name'] . " " . $this->_data['po_l_name'];
        }
    }
    
?>