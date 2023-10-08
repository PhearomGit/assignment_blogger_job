<?php
    interface PositionService{
        public function selectCategory();
        public function select();
        public function save();
        public function edit($id);
        public function delete($id);
    }
?>