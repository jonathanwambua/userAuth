<?php
if(isset($_POST['submit'])){
    $username = $_POST['email'];
    $password = $_POST['password'];

    ob_start();
    session_start();

    loginUser($username, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $success = false;

    $file = fopen('../storage/users.csv', 'r');
    while(($data = fgetcsv($file)) !== FALSE){
        if($data[1] == $email && $data[2] == $password){
            $success = true;
            $user_name_sess = $data[0];
            break;
        }
    }
    fclose($file);

    if($success){
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $user_name_sess;

        //redirect to dashboard
        header("location: ../dashboard.php");
        exit();
    }else{
        header("location: login.php");
    }
}

echo "HANDLE THIS PAGE";

