<?php
    include("../service/positionService.php");
    
    class positionimpl implements PositionService{
        public function select(){
            include("../connect/connect.php");
            $str = "SELECT * FROM `position`";
            $result = mysqli_query($conn,$str);
            return $result;
        }

       public function selectCategory(){
        include("../connect/connect.php");
        $str = "SELECT * FROM `job_category`";
        $result = mysqli_query($conn,$str);
        return $result;
       }

       public function save(){
            include("../connect/connect.php");
            $categ_id = $_POST['categ_id'];
            $company_id = $_POST['company_id'];
            $position = $_POST['position'];
            $salary = $_POST['salary'];
            $str = "INSERT INTO `position`(`category_id`, `company_id`, `position_name`, `salary`) VALUES ('$categ_id','$company_id','$position','$salary')";
            mysqli_query($conn,$str);
            header("Location:../admin/position.php");
       }
       public function edit($id){
        include("../connect/connect.php");
        $categ_id = $_POST['categ_id'];
        $company_id = $_POST['company_id'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $str = "UPDATE `position` SET `category_id`='$categ_id',`company_id`='$company_id',`position_name`='$position',`salary`='$salary' WHERE position_id = $id";
        mysqli_query($conn,$str);
        header("Location:../admin/position.php");
        }
       public function delete($id){
        include("../connect/connect.php");
        $strdelete = "DELETE FROM `position` WHERE position_id = $id";
        mysqli_query($conn,$strdelete);
        header("Location:../admin/position.php");
       }
}

    if(isset($_POST['position_submit'])){
        $positionimpl = new positionimpl();
        $positionimpl->save();

    }else if(isset($_GET['btnDelete'])){
        $positionimpl = new positionimpl();
        $positionimpl->delete($_GET['position_id']);
    
    }else if(isset($_POST['position_edit'])){
        $positionimpl = new positionimpl();
        $positionimpl->edit($_POST['position_id']);
    }

?>

