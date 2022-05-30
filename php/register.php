<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $data = array("username"=>$username, "email"=>$email, "password"=>$password);
    $file = fopen('../storage/users.csv', 'a');
    if(fputcsv($file, $data)){
        echo "User Successfully registered";
    };
    fclose($file);

    // echo "OKAY";
    echo "<br> OKAY";
}
echo "<br> HANDLE THIS PAGE";


