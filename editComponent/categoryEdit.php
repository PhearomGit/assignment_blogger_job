<?php
    $id = $_GET['id'];
    include("../serviceImpl/categoryImpl.php");
    include("../connect/connect.php");

    $categoryImpl = new categoryImpl();
    $str = "SELECT * FROM `job_category` WHERE category_Id = $id";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);


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
            Edit Category
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">

                <form action="../serviceImpl/categoryImpl.php" method="post">
                        <div class="d-none">
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="category name" name="category_Id" value = "<?php echo $row['category_Id'] ?>">
                        </div>

                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="category name" name="category_name" value = "<?php echo $row['category_name'] ?>">

                        <textarea class="form-control mt-2 mb-3" id="exampleFormControlTextarea1" rows="3"
                            placeholder="discription" name="category_discripion"><?php echo $row['description'] ?></textarea>

                        <input type="submit" name="category_edit" class="btn btn-primary" value="save">
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