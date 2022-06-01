<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    $csvfile = '../storage/users.csv';

    $tempfile = tempnam("../storage/", "tmp"); // produce a temporary file name, in the storage directory

    if(!$input = fopen($csvfile,'r')){
        die('could not open existing csv file');
    }
    
    if(!$output = fopen($tempfile,'w')){
        die('could not open temporary output file');
    }

    while(($data = fgetcsv($input)) !== FALSE){
        if($data[1] == $email){
            $data[2] = $password;
            fputcsv($output,$data);
        }
 
    }

    fclose($input);
    fclose($output);

    echo filesize($tempfile);

    if(filesize($tempfile) == 0){
        echo "User does not exist!";
    }else{
        unlink($csvfile);
        rename($tempfile,$csvfile);
    }
    

}
echo "HANDLE THIS PAGE";


