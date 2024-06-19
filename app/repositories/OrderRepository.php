<?php

namespace App\Repositories;
use PDO;

class OrderRepository extends Repository {
    public function createOrder($orderData)
    {
        $this->connection->beginTransaction();

        try {
            // Insert into orders table
            $sql = "INSERT INTO orders (unique_code, order_date, total_amount) VALUES (:unique_code, NOW(), :total_amount)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                'unique_code' => $orderData['unique_code'],
                'total_amount' => $orderData['total_amount']
            ]);

            $orderId = $this->connection->lastInsertId();

            // Insert into order_items table
            $sql = "INSERT INTO order_items (order_id, ticket_id, ticket_name, quantity, price, datetime) VALUES (:order_id, :ticket_id, :ticket_name, :quantity, :price, :datetime)";
            $stmt = $this->connection->prepare($sql);

            foreach ($orderData['items'] as $item) {
                $stmt->execute([
                    'order_id' => $orderId,
                    'ticket_id' => $item['ticket_id'],
                    'ticket_name' => $item['ticket_name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'datetime' => $item['datetime']
                ]);
            }

            $this->connection->commit();
        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function getOrderDetails($unique_code)
    {
        $sql = "SELECT * FROM orders WHERE unique_code = :unique_code";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['unique_code' => $unique_code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function uniqueCodeExists($uniqueCode)
    {
        $sql = "SELECT COUNT(*) FROM orders WHERE unique_code = :unique_code";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['unique_code' => $uniqueCode]);

        return $stmt->fetchColumn() > 0;
    }
}