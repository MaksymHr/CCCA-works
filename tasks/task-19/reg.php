<?php

$username = $login = $password0 = $password1 = $image = $type = $sex = $comment = "";
$spam = array();

if(isset($_POST['username'])) {
    echo '<h2>Register result</h2>';

    if($_POST['password0'] != $_POST['password1']){
        echo '<h3>Incorrect password verify</h3>';
    }
    else{
        if(isset($_FILES['avatar'])){
            $avatar = $_FILES['avatar'];
            $fileTmpName = $_FILES['avatar']['tmp_name'];
            $name = 'ava';
            $extension = image_type_to_extension($avatar[2]);
            $format = str_replace('jpg', 'jpg', $extension);
            move_uploaded_file($fileTmpName, __DIR__ . '\\' . $name . '.jpg');

            
            echo "Ur avatar:<br><img src='\\tasks\\task-19\\ava.jpg'>";
        }
        else{
            echo "Ur not uploaded avatar.";
        }
        echo '<br>';

        echo 'Username: ', $_POST['username'], '<br>';

        echo 'Login: ', $_POST['login'], '<br>';

        echo 'Type of account: ';
        if ($_POST['type'] == '0'){
            echo 'Non-Premium<br>';
        }
        else{
            echo 'Premium<br>';
        }

        echo 'Sex: ';
        if ($_POST['sex'] == '0'){
            echo 'Female';
        }
        else{
            echo 'Male';
        }
        echo '<br>';

        echo 'Accepted mailings: ';
        foreach($_POST['news'] as $value){
            echo $value, ' ';
        }
        echo '<br>';

        echo 'About u: ', $_POST['about'];
    }

    echo '<hr>';
}