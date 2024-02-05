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

    $check = "SELECT id, first_name, middle_name, last_name, uploaded_image FROM form_info WHERE first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name'";
    $run_check = mysqli_query($conn, $check);

    if (mysqli_num_rows($run_check) > 0) {
        $row = mysqli_fetch_assoc($run_check);
        $id = $row['id'];

        $update = "UPDATE form_info SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', uploaded_image = '$file_name' WHERE id = $id";
        mysqli_query($conn, $update);

        echo "Record Updated";
    } else {
       
        $sql = "INSERT INTO form_info (first_name, middle_name, last_name, uploaded_image) VALUES ('$first_name', '$middle_name', '$last_name', '$file_name')";

        if (mysqli_query($conn, $sql)) {
            echo "New Record Created";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
