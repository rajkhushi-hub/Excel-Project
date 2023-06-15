<?php

    interface EmpDao{
        public function insert(EmpBean $empBean):String;
        public function get();
    }
?>