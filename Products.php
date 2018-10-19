<?php

/**
 * Class Products
 */
class Products
{
    private $product;

    /**
     * @param $conn
     * @param $id
     * @return mixed
     */
    public function getProduct($conn, $id)
    {
        $query = $conn->query("SELECT * FROM products WHERE id = '$id'");
        $this->product = $query->fetch();

        return $this->product;
    }

}
