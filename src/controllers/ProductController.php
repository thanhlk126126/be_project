<?php

class ProductController
{
    public static function HomeController()
    {
     
        $productModels = new ProductModel();
        $productList = $productModels->getProductsView();
        $pruductHot = $productModels->getProductsBySale();
        var_dump($productList);
        var_dump($pruductHot);
        // include_once ROOT_DIR . '/src/views/trangchu.php';
        
    }
//đã xong tiềm kiếm
    public static function SearchController()
    {
        $productModels = new ProductModel();
        if (!empty($_GET["search"])){
        $search = $_GET["search"];
        
        $page = 1;
    
            if (count(URL) > 2) {
                $arr = explode("-", URL[2]);
                $page = $arr[count($arr) - 1];
            }

            /** 
             * Lấy số lượng sản phẩm hiện đang có dùng để phân trang (mỗi trang 12 sản phẩm)
             * Nếu số lượng sản phẩm không chia hết cho 12 => cộng thêm 1 vào số trang
             */
             $count = $productModels->CountsearchProducts($search);
             var_dump($count);
             $count = $count % 12 == 0 ? intval($count / 12) : intval($count / 12) + 1;
            
            /**
             * Tạo đường dẫn dùng cho phân trang
             */
            $link = BASE_URL . '/tim-kiem/' . URL[0] . '/trang-';
            $products = $productModels->searchProducts($search,$page);
            var_dump($products);
           
        }
           // include ROOT_DIR . '/src/views/user/danh-muc.php';
       // include_once ROOT_DIR . '/src/views/tim-kiem.php';
    }
    public static function ProductInfoController()
    {
        /**
         * Nếu URL > 1 => đã xác định sản phẩm => sản phẩm không tồn tại => hiển thị trang 404
         * Ngược lại => chưa xác định sản phẩm => hiển thị trang 404
         */
        $productInfo = new ProductModel();
        if (count(URL) > 1) {
            /**
             * Tách chuỗi tên-id thành 2 biến name và id
             */
            $name =$_GET["name"];
            $id = $_GET["id"];

            /**
             * Kiểm tra cookie đã lưu lần cập lượt xem của sản phẩm này chưa
             * Nếu chưa => lưu cookie => cập nhật lượt xem 
             */
            if (empty($_COOKIE[URL[0]])) {
                setcookie(URL[0], true, time() + 86400);
                $productInfo->updateViewProduct($id, $name);
            }

            /**
             * Lấy thông tin sản phẩm
             * Nếu sản phẩm không tồn tại => hiển thị trang 404
             * Nếu sản phẩm tồn tại => cắt chuỗi product_image thành mảng hình ảnh để hiển thị, tính giá tiền sản phẩm sau khi giảm giá => hiển thị giao diện trang thông tin sản phẩm
             */
            $product = $productModel->getProductInfo($id, $name);
            if (empty($product)) {
                include ROOT_DIR . '/src/views/admin/404.php';
            } else {
                $product_image = explode(",", $product['p_image']);
                $price = $product['p_price'] * (100 - $product['sale']) / 100;
                include ROOT_DIR . '/src/views/user/san-pham.php';
            }
            var_dump($product);
            
        }
         else {
            //include ROOT_DIR . '/src/views/admin/404.php';
        }
        var_dump($productInfo);
       
    }
    
    public static function AboutUs()
    {
        include_once ROOT_DIR . '/src/views/about-us.php';
    }

    public static function ContactUs()
    {
        include_once ROOT_DIR . '/src/views/contact-us.php';
    }
    

}

