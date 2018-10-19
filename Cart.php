<?php

/**
 * Class Cart
 */
class Cart
{
    private $sale = 0;
    private $deliveryCustomer = 0;

    /**
     * @param $product
     * @param int $quantity
     */
    public function addCart($product, $quantity = 1)
    {
        if (isset($_SESSION['cart'][$product['id']])) {
            $_SESSION['cart'][$product['id']]['qty'] += $quantity;
        } else {
            $_SESSION['cart'][$product['id']] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'price.sale' => $this->calcSale($product),
                'qty' => $quantity
            ];
        }
        $_SESSION['cart.qty'] = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] + $quantity :
            $quantity;
        $_SESSION['cart.sum'] = (isset($_SESSION['cart.sum'])) ? $_SESSION['cart.sum'] + $quantity * $product['price'] :
            $quantity * $product['price'];
        $_SESSION['cart.sum.sale'] = (isset($_SESSION['cart.sum.sale'])) ?
            $_SESSION['cart.sum.sale'] + $quantity * $_SESSION['cart'][$product['id']]['price.sale'] :
            $quantity * $_SESSION['cart'][$product['id']]['price.sale'];
    }

    /**
     * @param $id
     * @return bool
     */
    public function delCart($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }
        $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.sum.sale'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price.sale'];
        unset($_SESSION['cart'][$id]);
    }

    /**
     * @param $product
     * @return float|int
     */
    protected function calcSale($product)
    {
        if ($product['sale'] !== 0 || $this->sale !== 0 || $this->deliveryCustomer !== 0) {
            $price = $product['price'] - ($product['price']*$product['sale']/100 + $product['price']*$this->sale/100 + $product['price']*$this->deliveryCustomer/100);
        } else {
            $price = $product['price'];
        }
        return $price;
    }

    /**
     * @param int $sale
     */
    public function setSale($sale = 50)
    {
        $this->sale = $sale;
    }

    /**
     * @param int $delivery
     */
    public function setDeliveryCustomer($delivery = 10)
    {
        $this->deliveryCustomer = $delivery;
    }

    public function uploadCart()
    {

    }

    public function saveCart()
    {

    }
}
