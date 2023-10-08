<?php

    include("../service/positionService.php");
    class Benefit implements PositionService{
        public function selectCategory(){}

        public function select(){}

        public function save(){
            $position_id = $_POST['position_id'];
            $company_id = $_POST['company_id'];
            $description = $_POST['description'];
            include("../connect/connect.php");
            $str = "INSERT INTO `job_benefit`(`position_id`, `company_id`, `description`) VALUES ('$position_id','$company_id','$description')";
            mysqli_query($conn,$str);
            header("Location:../admin/benefit.php");
        }

        public function edit($id){
            include("../connect/connect.php");
            $description = $_POST['description'];
            $str="UPDATE `job_benefit` SET `description`='$description' WHERE benefit_id = $id";
            mysqli_query($conn,$str);
            header("Location:../admin/benefit.php");
        }

        public function delete($id){
            include("../connect/connect.php");
            $str = "DELETE FROM `job_benefit` WHERE benefit_id = $id";
            mysqli_query($conn,$str);
            header("Location:../admin/benefit.php");
        }
    }

    if(isset($_POST['submit'])){
        $Benefit = new Benefit();
        $Benefit->save();
    
    }else if(isset($_GET['btndelete'])){
        $Benefit = new Benefit();
        $Benefit->delete($_GET['benefit_id']);
    
    }else if(isset($_POST['submit_edit'])){
        $id = $_POST['benefit_id'];
        $Benefit = new Benefit();
        $Benefit->edit($id);
    }
?>