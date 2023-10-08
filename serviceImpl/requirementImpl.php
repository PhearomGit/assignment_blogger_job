<?php

    include("../service/positionService.php");
    class Requirement implements PositionService{
        public function selectCategory(){}

        public function select(){}

        public function save(){
            include("../connect/connect.php");
            $position_id = $_POST['position_id'];
            $company_id = $_POST['company_id'];
            $description = $_POST['description'];
            $str = "INSERT INTO `requirement`(`position_id`, `company_id`, `description`) VALUES ('$position_id','$company_id','$description')";
            mysqli_query($conn,$str);
            header("Location:../admin/requirement.php");
        }

        public function edit($id){
            include("../connect/connect.php");
            $description = $_POST['description'];
            $str = "UPDATE `requirement` SET `description`='$description' WHERE requierment_id = $id";
            mysqli_query($conn,$str);
            header("Location:../admin/requirement.php");
        }

        public function delete($id){
            include("../connect/connect.php");
            $description = $_POST['description'];
            $str = "DELETE FROM `requirement` WHERE requierment_id = $id";
            mysqli_query($conn,$str);
            header("Location:../admin/requirement.php");
        }
    }

    if(isset($_POST['submit'])){
        $Requirement = new Requirement();
        $Requirement->save();
    
    }else if(isset($_POST['submit_edit'])){
        $id = $_POST['requierment_id'];
        $Requirement = new Requirement();
        $Requirement->edit($id);
    
    }else if(isset($_GET['btnDelete'])){
        $id = $_GET['requierment_id'];
        $Requirement = new Requirement();
        $Requirement->delete($id);
    }

?>