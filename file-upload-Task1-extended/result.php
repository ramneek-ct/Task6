<?php
    include 'database.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name_val'];
        $middle_name = $_POST['middle_name_val'];
        $last_name = $_POST['last_name_val'];

       $file_name = '';
        if (isset($_FILES['upload_file'])) {
            $file_name = $_FILES['upload_file']['name'];
            $file_tmp = $_FILES['upload_file']['tmp_name'];
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
        }
        
        $sql = "INSERT INTO form_info (first_name, middle_name, last_name, uploaded_image) VALUES ('$first_name', '$middle_name', '$last_name', '$file_name')";
        if (mysqli_query($conn, $sql)) {
             echo "New record created successfully";
        } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }
?>


