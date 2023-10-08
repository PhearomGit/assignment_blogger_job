<?php
    session_start();
    if(!isset($_SESSION['pass'])){
        header("Location:../login/login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/job_category.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- data-table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<?php 
    include("../component/left-side-bar.html");
?>

<div class="right-side bg-primary p-3 d-flex justify-content-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        (+) Job Category
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">(+) Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="../serviceImpl/categoryImpl.php" method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="category name" name="category_name">
                        <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                            placeholder="discription" name="category_discripion"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="category_submit" class="btn btn-primary" value="save">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="right-side-first px-4 mt-4">
    <table id="example" class="table table-striped border" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                include("../serviceImpl/categoryImpl.php");
                $categoryImpl = new categoryImpl();
                $result = $categoryImpl->select();
                
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                <a href="../editComponent/categoryEdit.php?id=<?php echo $row['category_Id']; ?>"><i class="fas fa-edit fa-spin fs-5 me-3" style="color: #0b2db1;"></i></a>
                <a href="../serviceImpl/categoryImpl.php?category_Id=<?php echo $row['category_Id']; ?> &btnDelete=btnDelete"><i class="fa-solid fa-trash fa-shake fs-5" style="color: #e00022;"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<body>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<!-- data table -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>