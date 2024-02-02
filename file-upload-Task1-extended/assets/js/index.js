
$(document).ready(function () {
    $("#uploadButton").click(function (e) {
      e.preventDefault();
      $("#upload_file").click();
    });
  
    $("#fetchButton").click(function () {
      // Get input values
      var first_name1 = $("#first_name").val();
      var middle_name1 = $("#middle_name").val();
      var last_name1 = $("#last_name").val();
  
      // Create FormData
      var formData = new FormData();
      formData.append("first_name_val", first_name1);
      formData.append("middle_name_val", middle_name1);
      formData.append("last_name_val", last_name1);
      
      // Add file to FormData
      var fileInput = $("#upload_file")[0].files[0];
      formData.append("upload_file", fileInput);

      // Ajax request
      $.ajax({
        type: "POST",
        url: "result.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          alert(response);
        }
      });
    });
  });
  