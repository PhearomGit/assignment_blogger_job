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
    <link rel="stylesheet" href="../css/company.css">
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







<body>
<?php 
    include("../component/left-side-bar.html");
?>

<div class="right-side bg-primary p-3 d-flex justify-content-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        (+) Benefit
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">(+) Benefit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="../serviceImpl/benefitImpl.php" method="post">
                    <div class="modal-body">
                        <select class="form-select" aria-label="Default select example" name="position_id">
                        <?php
                             include("../serviceImpl/positionImpl.php");
                             $positionimpl = new positionimpl();
                             $result = $positionimpl->select();
                             while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <option value="<?php echo $row['position_id']; ?>"><?php echo $row['position_name']; ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-select my-2" aria-label="Default select example" name="company_id">
                        <?php
                             include("../connect/connect.php");
                             $strselectCompany = "SELECT * FROM `company_partner`";
                             $results = mysqli_query($conn,$strselectCompany);
                             while($rows = mysqli_fetch_assoc($results)){
                        ?>
                            <option value="<?php echo $rows['company_id']; ?>"><?php echo $rows['company_name']; ?></option>
                            <?php } ?>
                        </select>

                        <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                        placeholder="discription" name="description"></textarea>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-warning" name="submit" value="save">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="right-side-first">
    <table id="example" class="table table-striped border" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>position_name</th>
                <th>company_name</th>
                <th>description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                include("../connect/connect.php");
                $str = "SELECT * FROM job_benefit jb INNER JOIN position pos ON jb.position_id = pos.position_id INNER JOIN company_partner cp ON jb.company_id = cp.company_id";
                $result = mysqli_query($conn,$str);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['position_name']; ?></td>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="../serviceImpl/benefitImpl.php?benefit_id=<?php echo $row['benefit_id']; ?>&btndelete=btndelete"><i class="fa-solid fa-trash fa-beat"></i></a>
                    <a href="../editComponent/benefitEdit.php?benefit_id=<?php echo $row['benefit_id']; ?>"><i class="fas fa-edit fa-spin fs-5 ms-3" style="color: #0b2db1;"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>








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