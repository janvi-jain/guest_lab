<?php
    include 'db.php';

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $hobbies = implode(", ", $_POST['hobbies']);

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);

        $query = "INSERT INTO guests(firstname, lastname, email, comment, gender, hobbies, course, image)
        VALUES ('$firstname', '$lastname', '$email', '$comment', '$gender', '$hobbies', '$course', '$image')";

        if(mysqli_query($conn,$query)){
            echo "Guest Added Successfully!";

        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add New Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Add New Guest</h2>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter first name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter last name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>

                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" value="Male" class="form-check-input"
                                            required>
                                        <label class="form-check-label">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" value="Female" class="form-check-input">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hobbies</label>

                                <div class="form-control">
                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Reading"
                                            class="form-check-input">
                                        <label class="form-check-label">Reading</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Dancing"
                                            class="form-check-input">
                                        <label class="form-check-label">Dancing</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Music" class="form-check-input">
                                        <label class="form-check-label">Music</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="hobbies[]" value="Sports" class="form-check-input">
                                        <label class="form-check-label">Sports</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
    <label class="form-label">Course</label>

    <select name="course" class="form-select" required>
        <option value="">Select Course</option>
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="MCA">MCA</option>
        <option value="MBA">MBA</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Upload Image</label>

    <input type="file" name="image" class="form-control" required>
</div>

                            <div class="mb-3">
                                <label class="form-label">Comment</label>
                                <textarea name="comment" class="form-control" rows="3" placeholder="Enter your comment"
                                    required></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                Add Guest
                            </button>

                        </form>

                        <div class="text-center mt-3">
                            <a href="view.php" class="text-decoration-none">View All Guests</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>