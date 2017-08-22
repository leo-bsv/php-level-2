<?php

/**
 * Description of hw-lession-1
 *
 * @author Бурков Сергей aka leo
 */

// правильный перенос строки в зависимости от режима 
// запуска (консольный или веб)
if (!defined('EOL')) {
    if (PHP_SAPI == 'cli') {
        define('EOL', PHP_EOL);
    } else {
        define('EOL', '<br>');
    }
}

abstract class Product {

    private $name;
    private $count;
    abstract protected function getFinalPrice();
    
    abstract function getName()
    {
        return $this->name;
    }
    
    abstract function setName($value)
    {
        $this->name = $value;
    }
    
    abstract function getCount()
    {
        return $this->count;
    }
    
    abstract function setCount($value)
    {
        $this->count = $value;
    }
}

class DigitalProduct extends Product {
    const PRICE = 1000;
    
    public function getFinalPrice()
    {
        return self::PRICE * count;
    }
}

class PieceProduct extends Product {
    private $price = 2000;
    
    public function getFinalPrice()
    {
        return $this->price * $this->count;
    }     
}

class WeightedProduct extends Product {
    private $priceByKilo = 2000;

    public function getFinalPrice()
    {
        return $this->priceByKilo * $this->count;
    }        
}

