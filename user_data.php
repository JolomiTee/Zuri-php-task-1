<?php
    if (isset($_POST['submit'])){
        // echo "Your name is :" . htmlspecialchars( $_POST['name']). "<br>";
        // echo "Your email is :" . htmlspecialchars( $_POST['email']). "<br>";
        // echo "Your Date of Birth is :" . htmlspecialchars( $_POST['dob']). "<br>";
        // echo "Your Gender is :" . htmlspecialchars( $_POST['gender']). "<br>";
        // echo "Your country is :" . htmlspecialchars( $_POST['country']). "<br> <br>";

        print_r($_POST);
        echo '<br>';
        echo '<br>';

        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $dob = $_POST['dob']; 
        $gender = $_POST['gender'];
        $country = $_POST['country'];

        if (file_exists('./user_data.csv')) {
            echo 'File exists';
        } else {
            $fh = fopen("user_data.csv", 'w') or die('Failed to create file');
            $text = array(
                $name, $email, $dob, $gender, $country
            );
    
            fputcsv($fh, $text) ? 'File Created' : 'File not created';
            fclose($fh);

            echo "File 'userdata.csv' created successfully";
            echo '<br>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <form action="./user_data.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <label for="Date of Birth">Date of Birth:</label>
        <input type="date" name="dob" id="dob">
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <label for="country">Country:</label>
        <input type="text" name="country" id="country">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="">
        </div>

    </form>
</body>
</html>