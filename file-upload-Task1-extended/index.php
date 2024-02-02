<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_task1</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    

   <script src="assets/js/index.js"></script>
</head>
<body>
<form id="myForm" method="post" action="#" enctype="multipart/form-data" >
    <label for=" first_name">First name:</label><br>
    <input type="text" id="first_name" name="first_name"><br>

    <label for="middle_name">Middle name:</label><br>
    <input type="text" id="middle_name" name="middle_name"><br>

    <label for="last_name">Last name:</label><br>
    <input type="text" id="last_name" name="last_name"><br>

   <input type="file" name="upload_file" id="upload_file">
    <input type="submit" value="upload file" id="uploadButton" name="submit">

    <input type="submit" class="form" id="fetchButton" value="submit">
</form>

<?php
    include 'database.php';
        $sql = "SELECT first_name, middle_name, last_name, uploaded_image FROM form_info";
     $execute= mysqli_query($conn, $sql);

     if (mysqli_num_rows($execute)>0){
         while($row = mysqli_fetch_assoc($execute)){
            echo "First name: ".$row["first_name"]. ", Middle name: ".$row["middle_name"]. ", Last name: ".$row['last_name'].", Image: ".$row['uploaded_image']. "<br>";
         }
     }
     else{
        echo "No result";
     }
?>

</body>
</html>
