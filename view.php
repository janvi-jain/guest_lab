<?php
include 'db.php';

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$limit = 5;
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

$offset = ($page - 1) * $limit;

$countQuery = "SELECT * FROM guests
WHERE firstname LIKE '%$search%'
OR lastname LIKE '%$search%'";

$countResult = mysqli_query($conn, $countQuery);
$totalRecords = mysqli_num_rows($countResult);
$totalPages = ceil($totalRecords / $limit);

$query = "SELECT * FROM guests
WHERE firstname LIKE '%$search%'
OR lastname LIKE '%$search%'
LIMIT $offset, $limit";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Guest Records</h2>
        <a href="index.php" class="btn btn-primary">+ Add New Guest</a>
    </div>

     <form method="get" class="mb-3">

        <input type="text" name="search"
        class="form-control mb-2"
        placeholder="Search Name"
        value="<?php echo $search; ?>">

        <button type="submit" class="btn btn-primary">Search</button>

        <a href="view.php" class="btn btn-secondary">Reset</a>

    </form> 

    <div class="card shadow border-0">
        <div class="card-body">
        <form method="post" action="delete.php">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">

                    <tr class="table-primary">
                        <th>Select</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Course</th>
                        <th>Image</th>    
                        <th>Action</th>
                    </tr>

                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>

                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['hobbies']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><img src="uploads/<?php echo $row['image']; ?>" width="80" height="80"></td>
                         <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>"class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this record?')">
                            Delete</a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                </table>
            </div>
            <button type="submit" name="delete" class="btn btn-danger mt-3">
                Delete Selected
            </button>
        </form>
        </div>
    </div>
    <nav>
        <ul class="pagination justify-content-center">
            <?php
            if($page > 1){
            ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">
                    Previous</a>
                </li>
            <?php
            }
            ?>

            <?php
            for($i = 1; $i <= $totalPages; $i++){
            ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">
                    <?php echo $i; ?></a>
                </li>

            <?php
            }
            ?>

            <?php
            if($page < $totalPages)
            {
            ?>
                <li class="page-item">
                    <a class="page-link"
                    href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">
                    Next</a>
                </li>
            <?php
            }
            ?>

        </ul>
    </nav>

</div>

</body>
</html>