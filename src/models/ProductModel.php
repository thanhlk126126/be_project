<?php

class ProductModel extends Db
{
    // lấy tất cả sản phẩm
    public function getProductsView()
    {
                   
        $sql = parent::$conection->prepare("SELECT * FROM `product` WHERE `status` = 1 ORDER BY `view` ASC, `p_id` ASC LIMIT 0, 12");
        return parent::select($sql); // xuất kết quả
    }


    //lấy sp  theo sale cao nhất

    public function getProductsBySale()
    {
        $sql = parent::$conection->prepare("SELECT * FROM `product` WHERE `status` = 1 ORDER BY sale DESC, p_id DESC LIMIT 0,12");
        return parent::select($sql); // xuất kết quả
    }
    

    
    // public function getProductsSearch()
    // {
        
    //     $sql = parent::$conection->prepare("SELECT * FROM product WHERE p_name LIKE '?' ORDER BY p_price ASC, p_id ASC LIMIT 0, 12");
    //     return parent::select($sql); 
    // }

   
    
    // lấy sản phẩm theo từ khóa search (12sp) từ cao đến thấp. => có phân trang
    public function searchProducts($search,$page)
    {   $start = ($page - 1) * 12;
        $search=str_replace(' ', '%', $search);
        $search = "%" . $search . "%";
        //2. Viết câu SQL
        $sql = parent::$conection->prepare("SELECT * FROM product WHERE p_name LIKE ?   ORDER BY p_id DESC LIMIT ?, 12");
        $sql->bind_param('si', $search,$start);
        
        return parent::select($sql);
    }
    public function CountsearchProducts($search)
    {
        $search=str_replace(' ', '%', $search);
        $search = "%" . $search . "%";
        //2. Viết câu SQL
        $sql = parent::$conection->prepare("SELECT count(p_id) FROM product WHERE p_name LIKE ? ");
        $sql->bind_param('s', $search);
        
        return parent::select($sql)[0]["count(p_id)"];
    }
     /**
     * Lấy số lượng sản phẩm thuộc danh mục
     */
    public function getCountProductsCategory($id, $name)
    {
        $sql = parent::$conection->prepare("SELECT
        COUNT(`product`.`p_id`)
    FROM
        `product`
    JOIN `product_category` ON `product_category`.`productID` = `product`.`p_id`
    JOIN `categories` ON `product_category`.`category_id` = `categories`.`c_id`
    WHERE
        `product`.`status` = 1 AND `product_category`.`category_id` = ? AND `categories`.`c_name` LIKE ?");
        $sql->bind_param("is", $id, $name);
        return parent::select($sql)[0]['COUNT(`product`.`product_id`)'];
    }

    /**
     * Cập nhật lượt truy cập của sản phẩm
     */
    public function updateViewProduct($id, $name)
    {
        $name=str_replace(' ', '%', $name);
        $name = "%" . $name . "%";
        $sql = parent::$conection->prepare("UPDATE `product` SET `view` = `view`+1 WHERE `p_id` = ? AND `p_name` LIKE ?");
        $sql->bind_param("is", $id, $name);
        return $sql->execute();
    }

    /**
     * Lấy thông tin của sản phẩm
     * Nếu sản phẩm không tồn tại trả về null
     */
    public function getProductInfo($id, $name)
    {
        $name=str_replace(' ', '%', $name);
        $name = "%" . $name . "%";
        $sql = parent::$conection->prepare("SELECT * FROM `product` WHERE `p_id` = ? AND `p_name` LIKE ? AND `status` = 1");
        $sql->bind_param("is", $id, $name);
        $result = parent::select($sql);
        return count($result) != 0 ? parent::select($sql)[0] : null;
    }


    // lấy số lượng sản phẩm theo category
    public function getProductsBYID($id, $name, $start)
    {
        $name=str_replace(' ', '%', $name);
        $name = "%" . $name . "%";
        $sql = parent::$conection->prepare("SELECT `product` .* FROM `product` JOIN `product_category` ON `product_category`.`productID` = `product`.`p_id` JOIN `categories` 
        ON `product_category`.`category_ID` = `categories`.`c_id` 
        WHERE `product`.`status` = 1 AND `product_category`.`category_ID` =? 
        AND `categories`.`c_name` LIKE ? ORDER BY `product`.`p_id` DESC LIMIT ?, 12");
        $sql->bind_param("isi", $id, $name, $start);
        return parent::select($sql); // xuất kết quả
    }

}