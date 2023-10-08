<?php
    include("../service/categoryService.php");
    class categoryImpl implements classCategService{
        public function selectCategory(){
            
        }
    
        public function select(){
            include("../connect/connect.php");
            $strselect = "SELECT * FROM `company_partner`";
            $result = mysqli_query($conn,$strselect);
            return $result;
        }

        public function save(){
            include("../connect/connect.php");
            $company_name = $_POST['company_name'];

            $logo = $_FILES['logo']['name'];
            $tempname = $_FILES['logo']['tmp_name'];
            $folder = "../img/".$logo;

            $location = $_POST['location'];
            $phone_number = $_POST['phone_number'];
            $description = $_POST['description'];
            
            $strsave = "INSERT INTO `company_partner`(`company_name`, `logo`, `location`, `phone_number`, `description`) VALUES ('$company_name','$logo','$location','$phone_number','$description')";
            mysqli_query($conn,$strsave);

            move_uploaded_file($tempname,$folder);

            header("Location:../admin/company.php");
        }

        public function edit($id){
        }

        public function delete($id){
            include("../connect/connect.php");
            $strdelete = "DELETE FROM `company_partner` WHERE company_id = $id";
            mysqli_query($conn,$strdelete);
            header("Location:../admin/company.php");
        }
    }

    if(isset($_POST['submit'])){
        $categoryImpl = new categoryImpl();
        $categoryImpl->save();
        
    }else if(isset($_GET['btnDelete'])){
        $categoryImpl = new categoryImpl();
        $categoryImpl->delete($_GET['company_id']);
    }
?>

