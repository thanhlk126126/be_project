<?php
class CategoryModel extends Db{

    public function getCategories()
    {
        $sql = parent::$conection->prepare("SELECT * FROM `categories` WHERE `c_id` = ?");
        return parent::select($sql);
    }
}
?>