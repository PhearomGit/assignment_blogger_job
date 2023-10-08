<?php

    include("../service/categoryService.php");
    class categoryImpl implements classCategService{
        public function selectCategory(){
            
        }
    
        public function select(){
            include("../connect/connect.php");
            $str = "SELECT * FROM `job_category`";
            $result = mysqli_query($conn,$str);
            return $result;
        }

        public function save(){
            include("../connect/connect.php");
            $category_name = $_POST['category_name'];
            $category_discripion = $_POST['category_discripion'];
            $strSave = "INSERT INTO `job_category`(`category_name`, `description`) VALUES ('$category_name','$category_discripion')";
            mysqli_query($conn,$strSave);
        }

        public function edit($id){
            include("../connect/connect.php");
            $category_name = $_POST['category_name'];
            $category_discripion = $_POST['category_discripion'];
            $strEdit = "UPDATE `job_category` SET `category_name`='$category_name',`description`='$category_discripion' WHERE category_Id = $id";
            mysqli_query($conn,$strEdit);
        }
        public function delete($id){
            include("../connect/connect.php");
            $strdelete = "DELETE FROM `job_category` WHERE category_Id = $id";
            mysqli_query($conn,$strdelete);
        }

    }


    if(isset($_POST['category_submit'])){
        $categoryImpl = new categoryImpl();
        $categoryImpl->save();
        header("Location:../admin/job_category.php");

    }else if(isset($_POST['category_edit'])){
        $categoryImpl = new categoryImpl();
        $categoryImpl->edit($_POST['category_Id']);
        header("Location:../admin/job_category.php");

    }else if(isset($_GET['btnDelete'])){
        $id = $_GET['category_Id'];
        $categoryImpl = new categoryImpl();
        $categoryImpl->delete($id);
        header("Location:../admin/job_category.php");
    }
?>

