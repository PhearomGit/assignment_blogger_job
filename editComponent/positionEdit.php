<?php
    include("../connect/connect.php");
    $position_id = $_GET['position_id'];
    $str = "SELECT * FROM `position` WHERE position_id = $position_id";
    $result = mysqli_query($conn,$str);
    $rows = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="w-50 mx-auto mt-5">
    <div class="card">
        <div class="card-header">
            Edit Position
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">

            <form action="../serviceImpl/positionImpl.php" method="post">
                    <div class="modal-body">
                    <input type="text" class="form-control d-none" id="exampleFormControlInput1" placeholder="Position"
                            name="position_id" value="<?php echo $rows['position_id']; ?>">

                        <select class="form-select" aria-label="Default select example" name="categ_id">
                            <?php
                                include("../connect/connect.php");
                                $str = "SELECT * FROM `job_category`";
                                $result = mysqli_query($conn,$str);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['category_Id']; ?>">
                                <?php echo $row['category_name'] ?>
                            </option>
                            <?php } ?>
                        </select>


                        <select class="form-select my-2" aria-label="Default select example" name="company_id">


                            <?php
                                include("../connect/connect.php");
                                $str = "SELECT * FROM `company_partner`";
                                $result = mysqli_query($conn,$str);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['company_id'] ?>">
                                <?php echo $row['company_name']; ?>
                            </option>
                            <?php } ?>


                        </select>

                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Position"
                            name="position" value="<?php echo $rows['position_name']; ?>">

                        <input type="text" class="form-control my-2" id="exampleFormControlInput1" placeholder="Salary"
                            name="salary" value="<?php echo $rows['salary']; ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="position_edit" class="btn btn-primary" value="save">
                    </div>
                </form>


            </blockquote>
        </div>
    </div>
</div>




<body>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>