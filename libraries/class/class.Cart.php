<?php
class Cart
{
    private $d;

    function __construct($d)
    {
        $this->d = $d;
    }

    public function getProductInfo($pid = 0)
    {
        $row = null;
        if ($pid) {
            $row = $this->d->rawQueryOne("select * from #_product where id = ? limit 0,1", array($pid));
        }
        return $row;
    }
    public function removeProduct($code_order = '')
    {
        if (!empty($_SESSION['cart']) && $code_order != '') {
            $max = count($_SESSION['cart']);

            for ($i = 0; $i < $max; $i++) {
                if ($code_order == $_SESSION['cart'][$i]['code']) {
                    unset($_SESSION['cart'][$i]);
                    break;
                }
            }

            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    public function getOrderTotal()
    {
        $sum = 0;

        if (!empty($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);

            for ($i = 0; $i < $max; $i++) {
                $pid = $_SESSION['cart'][$i]['productid'];
                $q = $_SESSION['cart'][$i]['qty'];
                $proinfo = $this->getProductInfo($pid);

                if ($proinfo['sale_price']) $price = $proinfo['sale_price'];
                else $price = $proinfo['regular_price'];
                $sum += ($price * $q);
            }
        }

        return $sum;
    }

    public function addToCart($q = 1, $pid = 0)
    {
        if ($pid < 1 or $q < 1) return;

        $code_order = md5($pid);

        if (!empty($_SESSION['cart'])) {
            if (!$this->productExists($code_order, $q)) {
                $max = count($_SESSION['cart']);
                $_SESSION['cart'][$max]['productid'] = $pid;
                $_SESSION['cart'][$max]['qty'] = $q;
                $_SESSION['cart'][$max]['code'] = $code_order;
            }
        } else {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][0]['productid'] = $pid;
            $_SESSION['cart'][0]['qty'] = $q;
            $_SESSION['cart'][0]['code'] = $code_order;
        }
    }

    private function productExists($code_order = '', $q = 1)
    {
        $flag = 0;

        if (!empty($_SESSION['cart']) && $code_order != '') {
            $q = ($q > 1) ? $q : 1;
            $max = count($_SESSION['cart']);

            for ($i = 0; $i < $max; $i++) {
                if ($code_order == $_SESSION['cart'][$i]['code']) {
                    $_SESSION['cart'][$i]['qty'] += $q;
                    $flag = 1;
                }
            }
        }

        return $flag;
    }
}
