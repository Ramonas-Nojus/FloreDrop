<?php

class Products extends Db {

    public function getAllProducts($page_results, $per_page){
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ?, ?";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue(1, $page_results, \PDO::PARAM_INT);
        $stmt->bindValue(2, $per_page, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function getPopularProducts(){
        $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 6";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function postProduct($seller, $price, $name, $category, $image, $description, $image_temp){
        $sql = "INSERT INTO products(seller, name, description, category,image, price, date, views) VALUE(:seller, :name, :description, :category, :image, :price, now(), 0)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("seller", $seller);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("description", $description);
        $stmt->bindValue("category", $category);
        $stmt->bindValue("image", $image);
        $stmt->bindValue("price", $price);
        $stmt->execute();

        $folder = './img/'. $image;

        move_uploaded_file($image_temp, $folder);

        return header('Location: search.php'); 
    }

    public function getRowsCount(){
        $sql = "SELECT COUNT(*) as count FROM products";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    public function getProduct($p_id){
        $sql = "SELECT * FROM products WHERE id = :p_id";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("p_id", $p_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addView($p_id){
        $sql = "UPDATE products SET views = views + 1 WHERE id = :p_id";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("p_id", $p_id);
        return $stmt->execute();
    }

    public function getUsersProducts($seller){
        $sql = "SELECT * FROM products WHERE seller = :seller";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("seller", $seller);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addToCart($product_id){
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        } else if(!in_array($product_id, $_SESSION['cart'])){
            $_SESSION['cart'][] = (int)$product_id;
        }

        if(isset($_SESSION['id'])){
                
        }

        header("Location: product.php?p_id=$product_id");

    }

}   