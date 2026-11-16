<?php
include 'db.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";

    $image = $_POST['old_image'];
    if($_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    }

    $query = "UPDATE guests SET firstname='$firstname', lastname='$lastname', email='$email', comment='$comment',gender='$gender',hobbies='$hobbies' ,course='$course',
    image='$image' WHERE id=$id";

    if(mysqli_query($conn, $query)){
        header("Location: view.php");
        exit;
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $query = "SELECT * FROM guests WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

if(!$row){
    die("Record Not Found!");
}

$selectedHobbies = explode(", ", $row['hobbies']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">Edit Guest Details</h2>

                        <form method="post" action="" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control"
                                    value="<?php echo $row['firstname']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control"
                                    value="<?php echo $row['lastname']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?php echo $row['email']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" value="Male" class="form-check-input" <?php
                                            if($row['gender']=='Male' ) echo 'checked' ; ?>
                                        required>
                                        <label class="form-check-label">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" value="Female" class="form-check-input" <?php
                                            if($row['gender']=='Female' ) echo 'checked' ; ?>>
                                        <label class="form-check-label">Female</label>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hobbies</label>
                                <div class="form-control">
                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Reading" class="form-check-input"
                                            <?php if(in_array('Reading', $selectedHobbies)) echo 'checked' ; ?>>
                                        <label class="form-check-label">Reading</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Dancing" class="form-check-input"
                                            <?php if(in_array('Dancing', $selectedHobbies)) echo 'checked' ; ?>>
                                        <label class="form-check-label">Dancing</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Music" class="form-check-input"
                                            <?php if(in_array('Music', $selectedHobbies)) echo 'checked' ; ?>>
                                        <label class="form-check-label">Music</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Sports" class="form-check-input"
                                            <?php if(in_array('Sports', $selectedHobbies)) echo 'checked' ; ?>>
                                        <label class="form-check-label">Sports</label>
                                    </div>
                                </div>

                                <div class="mb-3">
    <label class="form-label">Course</label>

    <select name="course" class="form-select" required>
        <option value="">Select Course</option>

        <option value="BCA" <?php if($row['course'] == 'BCA') echo 'selected'; ?>>BCA</option>

        <option value="BBA" <?php if($row['course'] == 'BBA') echo 'selected'; ?>>BBA</option>

        <option value="MCA" <?php if($row['course'] == 'MCA') echo 'selected'; ?>>MCA</option>

        <option value="MBA" <?php if($row['course'] == 'MBA') echo 'selected'; ?>>MBA</option>
    </select>
</div>

                                <div class="mb-3">
    <label class="form-label">Upload New Image</label>
    <input type="file" name="image" class="form-control">
    <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
</div>

                                <div class="mb-3">
                                    <label class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" rows="3"
                                        required><?php echo $row['comment']; ?></textarea>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary w-100">
                                    Update Record
                                </button>

                        </form>

                        <div class="text-center mt-3">
                            <a href="view.php" class="text-decoration-none">Back to Records</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>