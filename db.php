<?php

$conn = mysqli_connect(
    "sql310.infinityfree.com",
    "if0_43489503",
    "pariijain143",
    "if0_43489503_guest_lab",
    3306
);
if($conn)
{
    echo "Database Connected Successfully!";
}

if(!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>