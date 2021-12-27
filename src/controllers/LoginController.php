<?php
class LoginController
{   
    // đăng nhập
    public static function Log() {

        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            $user = $userModel->login($email, $password);

        if($user) {
        $_SESSION['email'] = $user;
        
    }
        session_start();
        if(session_destroy()) {
            header("/src/views/login.php");
        }
        include_once ROOT_DIR . '/src/views/login.php';
    }
    public static function Adre() {
        include_once ROOT_DIR . '/src/views/ad-re.php';
    }
    public static function Admin() {
        include_once ROOT_DIR . '/src/views/admin.php';
    }
    // đăng kí
    public static function Regi()
{
      
    // kiểm tra đã nhập user với pass chưa
    if(isset($_POST['email']) && isset($_POST['password'])) {
    $FirstName=$_POST['first_name'];
    $LastName=$_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword=$_POST['password_repeat'];
    //kiểm tra pass với pass nhập lại
    if ($password == $repassword) {
        $userModel = new UserModel();
        //kiểm tra xem đã tồn tại
        if($userModel->addUser($FirstName,$LastName,$email, $password)) {
           $successfully="<p style='Color:black'>Register successfully</p>";
            echo $successfully;
        }
        // 
        else {
            $failed="<p style='Color:black'>Register Failed</p>";
            echo  $failed;
        }
    }
    }
    else {
        $failed="<p style='Color:black'>wrong password</p>";
        echo $failed;
    }
        include_once ROOT_DIR . '/src/views/register.php';
}
    public static function Reg() {
        include_once ROOT_DIR . '/src/views/registration.php';
    }
    public static function Forgot() {
        include_once ROOT_DIR . '/src/views/forgot-password.php';
    }

   

   
}