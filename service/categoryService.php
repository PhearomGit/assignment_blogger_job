<?php

    interface classCategService{
       public function select();
       public function save();
       public function edit($id);
       public function delete($id);
       public function selectCategory();
    }
    
?>