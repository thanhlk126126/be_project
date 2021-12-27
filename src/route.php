<?php

if (count(URL) != 0) {
    switch (URL[0]) {
        case 'trang-chu':
            ProductController::HomeController();
            break;
        case 'tim-kiem':
            ProductController::SearchController();
            break;
        case 'san-pham':
            ProductController::ProductInfoController();
            break;
        case 'about':
            ProductController::AboutUs();
            break;
        case 'tuong-tac':
            ProductController::ContactUs();
            break;
        case 'gio-hang':
            CartController::Cart();
            break;
        case 'thanh-toan':
            CartController::Pay();
            break;
        case 'admin-dk':
            LoginController::Adre();
            break;
        case 'admin':
            LoginController::Admin();
            break;
        case 'dang-ki':
            LoginController::Regi();
            break;
        case 'quen-mat-khau':
            LoginController::Forgot();
            break;
        case 'dang-nhap':
            LoginController::Log();
            break;
        default:
            include ROOT_DIR . '/src/views/404.php';
            break;
    }
} else {
    ProductController::HomeController();
}
