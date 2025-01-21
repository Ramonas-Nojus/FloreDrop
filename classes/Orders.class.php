<?php 

class Orders extends Db {

    public function addOrder($buyer_name, $buyer_email, $buyer_address, $products, $price, $order_number){
        $sql = "INSERT INTO orders(buyer_name, buyer_email, buyer_full_address, products, price, date, order_number) 
        VALUES(:buyer_name, :buyer_email, :buyer_full_address, :products, :price, now(), :order_number)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("buyer_name", $buyer_name);
        $stmt->bindValue("buyer_email", $buyer_email);
        $stmt->bindValue("buyer_full_address", $buyer_address);
        $stmt->bindValue("products", $products);
        $stmt->bindValue("price", $price);
        $stmt->bindValue("order_number", $order_number);

        $stmt->execute();
    }

    public function GetUsersOrder($id){
        $sql = "SELECT * FROM orders WHERE buyer_id = :id ORDER BY date DESC";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetOrder($order_number){
        $sql = "SELECT * FROM orders WHERE order_number = :order_number";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("order_number", $order_number);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}