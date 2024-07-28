<?php

class Products extends Db {

    public function getAllProducts($page_results, $per_page, $category){
        $sql = "SELECT * FROM products WHERE category = :category ORDER BY id DESC LIMIT :page_results, :per_page";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("page_results", $page_results, \PDO::PARAM_INT);
        $stmt->bindValue("per_page", $per_page, \PDO::PARAM_INT);
        $stmt->bindValue("category", $category);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    // public function getPopularProducts(){
    //     $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 6";
    //     $stmt = $this->connection()->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    public function postProduct($price, $name, $category, $image, $description, $image_temp){
        $sql = "INSERT INTO products(name, description, category,image, price, date, views) VALUE(:name, :description, :category, :image, :price, now(), 0)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("name", $name);
        $stmt->bindValue("description", $description);
        $stmt->bindValue("category", $category);
        $stmt->bindValue("image", $image);
        $stmt->bindValue("price", $price);
        $stmt->execute();

        $folder = './img/'. $image;

        move_uploaded_file($image_temp, $folder);

        return header('Location: products.php?category='.$category); 
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

    public function addToCart($product_id){
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][] = (int)$product_id;

        } else if(!in_array($product_id, $_SESSION['cart'])){
            $_SESSION['cart'][] = (int)$product_id;
        }

        $this->UpdateCart();

        header("Location: product.php?p_id=$product_id");

    }

    public function UpdateCart() {
        if(isset($_SESSION['id'])){
            $sql = "UPDATE users SET cart = :cart WHERE id = :id";
            $stmt = $this->connection()->prepare($sql);
            $stmt->bindValue("cart", serialize($_SESSION['cart']));
            $stmt->bindValue("id", $_SESSION['id']);
            return $stmt->execute();
        }
    }

}   