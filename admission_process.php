<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars(trim($_POST['fullName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $course = htmlspecialchars(trim($_POST['course']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Handle file upload
    $profilePicture = $_FILES['profilePicture'];
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($profilePicture['name']);

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($profilePicture['tmp_name'], $uploadFile)) {
        $profileLink = htmlspecialchars($uploadFile);
    } else {
        die("Error uploading profile picture.");
    }

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Admission Successful</title>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: #f0f0f5;
                padding: 20px;
                text-align: center;
                color: #333;
            }
            .container {
                background: #ffffff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                max-width: 500px;
                margin: 50px auto;
            }
            h1 {
                color: #4caf50;
            }
            p {
                font-size: 16px;
                margin: 10px 0;
            }
            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #4caf50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background 0.3s;
            }
            .btn:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>🎉 Admission Successful!</h1>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Date of Birth:</strong> $dob</p>
            <p><strong>Gender:</strong> $gender</p>
            <p><strong>Course:</strong> $course</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Profile Picture:</strong> <a href='$profileLink' target='_blank'>View</a></p>
            <a href='index.html' class='btn'>Apply Again</a>
        </div>
    </body>
    </html>";
} else {
    header('Location: index.html');
    exit();
}
?>
