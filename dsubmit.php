<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = ""; // Directory where you want to store the uploaded images
    $target_file = $target_dir . "trail.png"; // Path of the uploaded image

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    

    // Allow only certain file formats
    if($imageFileType != "png") { // Only allowing PNG format, you can adjust this as needed
        echo "Sorry, only PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            $plaintext = $_POST["watermarkText"];
            $encryptionTechnique = $_POST["encryptionTechnique"];

            $output = exec("python decode.py");

            if($encryptionTechnique=='md5')
        {
           
            $watermarkText = md5($plaintext);
        }
        else if($encryptionTechnique=='sha256')
        {
            
            $watermarkText = hash('sha256',$plaintext);
        }
        else if($encryptionTechnique=='base64')
        {
            
            $watermarkText = base64_encode($plaintext);

        }  

        if($watermarkText==$output)
        {
            echo "<script>
            alert('Encryption Successfully matched');
            window.location.href='decrypt.html';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Encryption Not Matched');
            window.location.href='decrypt.html';
            </script>";
        }




            


        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
