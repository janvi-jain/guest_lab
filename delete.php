<?php
    include 'db.php';

    if(isset($_POST['delete'])){
        if(isset($_POST['ids'])){
            foreach($_POST['ids'] as $id){
                $id = (int)$id;
                $query = "SELECT image FROM guests WHERE id = $id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                
                if($row && $row['image'] != ""){
                    if(file_exists("uploads/" . $row['image'])){
                        unlink("uploads/" . $row['image']);
                    }
                }
                $query = "DELETE FROM guests WHERE id=$id";
                mysqli_query($conn, $query);
            }
        }
          header("Location: view.php");
    exit;
    }

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $query = "SELECT image FROM guests WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        
        if($row && $row['image'] != ""){
            if(file_exists("uploads/" . $row['image'])){
                unlink("uploads/" . $row['image']);
            }
        }
        
        $query = "DELETE FROM guests WHERE id=$id";
        if(mysqli_query($conn, $query)){
            header("Location: view.php");
            exit;
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }

    
    
?>