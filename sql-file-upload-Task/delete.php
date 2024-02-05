<?php
    include 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){
        $id = $_POST['id'];

        $delete = "DELETE FROM form_info WHERE id = $id";
        if (mysqli_query($conn, $delete)) {
            echo json_encode($id);
            echo " Record Deleted";
        } else {
            echo "Error: " . $delete . "<br>" . mysqli_error($conn);
        }
    }
?>
