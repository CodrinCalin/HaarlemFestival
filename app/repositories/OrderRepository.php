<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\OrderItem;
use DateTime;
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
                    'datetime' => $item['datetime']->format('Y-m-d H:i:s')
                ]);
            }

            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function getOrderDetails($unique_code)
    {
        $orderData = $this->fetchOrderData($unique_code);

        if (!$orderData) {
            return null; // Return null or handle the case where no order is found
        }

        // Create Order object
        $order = $this->makeOrder($orderData);

        // Retrieve order items
        $orderItemsData = $this->fetchOrderItemsData($order->getId());

        foreach ($orderItemsData as $itemData) {
            // Create OrderItem object
            $orderItem = $this->makeOrderItem($itemData);

            // Add order item to order
            $order->addOrderItem($orderItem);
        }

        return $order;
    }

    // <editor-fold desc="Fetch order data">
    private function fetchOrderData($unique_code)
    {
        $sql = "SELECT id, unique_code, order_date, total_amount FROM orders WHERE unique_code = :unique_code";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['unique_code' => $unique_code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function fetchOrderItemsData($orderId)
    {
        $sql = "SELECT id, order_id, ticket_id, ticket_name, quantity, price, datetime FROM order_items WHERE order_id = :order_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // </editor-fold>

    // <editor-fold desc="Create order and order item">
    private function makeOrder(array $orderData): Order
    {
        $order = new Order();
        $order->setId($orderData['id']);
        $order->setUniqueCode($orderData['unique_code']);
        $order->setOrderDate(new DateTime($orderData['order_date']));
        $order->setTotalAmount(floatval($orderData['total_amount']));
        return $order;
    }

    private function makeOrderItem(array $itemData): OrderItem
    {
        $orderItem = new OrderItem();
        $orderItem->setId($itemData['id']);
        $orderItem->setOrderId($itemData['order_id']);
        $orderItem->setTicketId($itemData['ticket_id']);
        $orderItem->setTicketName($itemData['ticket_name']);
        $orderItem->setQuantity($itemData['quantity']);
        $orderItem->setPrice(floatval($itemData['price']));
        $orderItem->setDatetime(new DateTime($itemData['datetime']));
        return $orderItem;
    }
    // </editor-fold>

    public function uniqueCodeExists($uniqueCode)
    {
        $sql = "SELECT COUNT(*) FROM orders WHERE unique_code = :unique_code";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['unique_code' => $uniqueCode]);

        return $stmt->fetchColumn() > 0;
    }
}