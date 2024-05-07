<?php 

class Orders extends Db {

    public function addOrder($buyer_name, $buyer_email, $buyer_address, $products, $price, $seller_name){
        $sql = "INSERT INTO orders(buyer_name, buyer_email, buyer_full_address, products, price, seller_name, date) 
        VALUES(:buyer_name, :buyer_email, :buyer_full_address, :products, :price, :seller_name, now())";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("buyer_name", $buyer_name);
        $stmt->bindValue("buyer_email", $buyer_email);
        $stmt->bindValue("buyer_full_address", $buyer_address);
        $stmt->bindValue("products", $products);
        $stmt->bindValue("price", $price);
        $stmt->bindValue("seller_name", $seller_name);

        $stmt->execute();
    }
    
}