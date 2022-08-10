<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ProductDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO product VALUES(null,?, ?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->price);
        $stmt->bindParam(3, $object->quantity);
        $stmt->bindParam(4, $object->ingredients1);
        $stmt->bindParam(5, $object->ingredients2);
        $stmt->bindParam(6, $object->ingredients3);

        return $stmt->execute();
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('UPDATE product SET product_name=?, product_quantity=? WHERE product_ingredients1=?,  product_ingredients2=?, product_ingredients3=?;');
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->quantity);
        $stmt->bindParam(3, $object->ingredients1);
        $stmt->bindParam(4, $object->ingredients2);
        $stmt->bindParam(5, $object->ingredients3);
        return $stmt->execute();
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $rs = $connection->query('select * from product');
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from product where productCode = $id");
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('delete from product where productCode = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
