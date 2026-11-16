<?php
include 'db.php';

$query = "SELECT * FROM guests";
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

    <div class="card shadow border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">

                    <tr class="table-primary">
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

        </div>
    </div>

</div>

</body>
</html>