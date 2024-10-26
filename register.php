<?php
session_start();
include 'database/connection.php';

/*to check if the user actually clicked signup to move futher. Or else user can access next page even if he injects in URL */
if(isset($_POST["registerbtn"])){
    $userName = $_POST["name"];
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];
    $userNumber = $_POST["number"];

    $checkUsernameQuery = "SELECT * FROM user WHERE userName = '$userName'";
    $result = mysqli_query($conn, $checkUsernameQuery);

     if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userNumber)) {
        echo "<script>
                    alert('All fields are required. Please fill in all the fields.');
                      window.location.href='login.php';
                    </script>";
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        echo "<script>
                    alert('Username already exists. Please choose a different username.');
                      window.location.href='login.php';
                    </script>";
        exit;
    }
    if (strlen($userPassword) < 8) {
        echo "<script>
                    alert('Password must be at least 8 characters long.');
                      window.location.href='login.php';
                    </script>";
        exit;
    }

    // /*To check invalid UID*/
    // if(invalidUid($userName)!==false){
    //     // header("location: ../login.php?error=invalidUID");
    //     // exit();
    // }

    // /*To check invalid Email */
    // if(invalidEmail($userEmail)!==false){
    //     // header("location: ../login.php?error=invalidemail");
    //     // exit();
    // }
    $hashedPassword = md5($userPassword);
$sql="INSERT INTO user(userName,userPassword,userEmail,userNumber)
VALUES ('$userName','$hashedPassword','$userEmail','$userNumber')";

if(mysqli_query($conn,$sql)){
    header("Location:login.php");
}
else{
    echo "Error".mysqli_error($conn);
}
}
// else{
//     header("location: ../login.php?error=NoConnectionMan");
// }
