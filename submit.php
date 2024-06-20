<?php
// Database configuration
$dbHost = 'localhost';
$dbName = 'hiddenwatermark';
$dbUser = 'root';
$dbPass = '';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$random_number = rand(11000, 1999999999999);


// Handle file upload
$targetDir = "uploads/";
$targetFile = $targetDir .$random_number. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        // Insert data into the database
        $plaintext = $_POST['watermarkText'];
        $encryptionTechnique = $_POST['encryptionTechnique'];
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
        

        
        $image = basename($_FILES["fileToUpload"]["name"]);

        $sql = "INSERT INTO watermarks (simpletext,image, watermarkText, encryptionTechnique) VALUES ('$plaintext','$targetFile', '$watermarkText', '$encryptionTechnique')";
        if ($conn->query($sql) === TRUE) {
            

            // Path to the Python interpreter
            $python = 'python';

            // Path to the Python script
            $pythonScript = 'encode.py';

            // Build the command to run the Python script
            $command = "$python $pythonScript";

            // Execute the command and capture the output
            $output = shell_exec($command);

            ?>

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypted Image Download</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #4caf50;
            padding: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .download-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Encrypted Image Download</h1>
     <nav>
        <a href="index.html">Encrypt Image</a>
        <a href="decrypt.html">Decrypt Image</a>
        <a href="view.php">View Encrypts</a>
        <a href="about.html">About Us</a>
        <a href="contact.html">Contact</a>
    </nav>
    <br>
    <br>

    <img src="sec.png" alt="Encrypted Image">

    <a href="sec.png" class="download-link" download="sec.png">Download Encrypted Image</a>

    

</body>
</html>


            <?php





        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close the database connection
$conn->close();
?>