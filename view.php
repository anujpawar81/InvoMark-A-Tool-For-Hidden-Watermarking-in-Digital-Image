<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Watermarking Tool</title>
    <style>
          body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            width: 100%;
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
        #container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        input, textarea, select {
            margin-bottom: 15px;
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 12px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- Your existing HTML structure -->

    <header>
        <h1>Image Watermarking Tool</h1>
    </header>

    <nav>
        <a href="index.html">Encrypt Image</a>
        <a href="decrypt.html">Decrypt Image</a>
        <a href="view.php">View Encrypts</a>
        <a href="about.html">About Us</a>
        <a href="contact.html">Contact</a>
    </nav>

    <!-- Table to display images, text, and encryption type -->
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Text</th>
                <th>Encryption Type</th>
            </tr>
        </thead>
        <tbody>
            
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

                $sql = "SELECT * FROM `watermarks`  ORDER BY `watermarks`.`id` DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    
                  ?>

                    <tr>
                <td><img src="<?php  echo $row['image']; ?>" width="200px" height="100px" alt="Image 1"></td>
                <td><?php  echo $row['simpletext']; ?></td>
                <td><?php  echo $row['encryptionTechnique']; ?></td>
                
            </tr>

                  <?php
                  }
                } 

            ?>


            
            
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <!-- Your existing hidden divs for About and Contact -->

</body>
</html>
