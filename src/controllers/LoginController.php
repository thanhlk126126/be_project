<?php
class LoginController
{
    public static function Log() {
        include_once ROOT_DIR . '/src/views/login.php';
    }
    public static function Adre() {
        include_once ROOT_DIR . '/src/views/ad-re.php';
    }
    public static function Admin() {
        include_once ROOT_DIR . '/src/views/admin.php';
    }
    public static function Regi() {
        include_once ROOT_DIR . '/src/views/register.php';
    }
    public static function Reg() {
        include_once ROOT_DIR . '/src/views/registration.php';
    }
    public static function Forgot() {
        include_once ROOT_DIR . '/src/views/forgot-password.php';
    }

   

   
}