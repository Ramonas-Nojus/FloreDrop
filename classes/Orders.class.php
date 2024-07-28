<?php 

class Orders extends Db {

    public function addOrder($buyer_name, $buyer_email, $buyer_address, $products, $price){
        $sql = "INSERT INTO orders(buyer_name, buyer_email, buyer_full_address, products, price, date) 
        VALUES(:buyer_name, :buyer_email, :buyer_full_address, :products, :price, now())";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("buyer_name", $buyer_name);
        $stmt->bindValue("buyer_email", $buyer_email);
        $stmt->bindValue("buyer_full_address", $buyer_address);
        $stmt->bindValue("products", $products);
        $stmt->bindValue("price", $price);
        $stmt->execute();
    }

    public function GetUsersOrder($id){
        $sql = "SELECT * FROM orders WHERE buyer_id = :id ORDER BY date DESC";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}