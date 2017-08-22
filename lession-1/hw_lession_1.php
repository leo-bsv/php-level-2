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

class Product 
{
    public $name;
    
    public $width;
    public $height;
    public $color;
    public $weight;
    
    const ST_STORAGE = 0;
    const ST_CUSTOM = 1;
    
    private $state_labels = ['Складская позиция', 'Заказная позиция'];
    
    protected $state;
    protected $price;
    
    function __construct($name)
    {
        $this->name = $name;
    }
    
    function getStateLabel($state) 
    {
        return $this->state_labels[$state];
    }

    function setPrice($money)
    {
        $this->price = $money;
    }

    function setState($state)
    {
        $this->state = $state;
    }
    
    function setParams($width, $height, $color, $weight)
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
        $this->weight = $weight;
    }
    
    function productInfo()
    {
        echo 'Информация о продукте' . EOL;
        echo 'Наименование: ' . $this->name . EOL;
        echo 'Ширина, м: ' . $this->width . EOL;
        echo 'Высота, м: ' . $this->height . EOL;
        echo 'Цвет: ' . $this->color . EOL;
        echo 'Вес, кг: ' . $this->weight . EOL;
        echo 'Состояние: ' . $this->state_labels[$this->state] . EOL;
        echo 'Цена, руб.: ' . $this->price . EOL;
    }
}

class ReservedProduct extends Product 
{
    public $reserved = false;
    
    function setReserved($boolValue)
    {
        $this->reserved = $boolValue;
    }
    
    function isReserved()
    {
        return $this->reserved;
    }
}

class InformationProduct extends Product
{
    public $lisense;
    public $trialPeriod;
    public $operationSystem;
    public $vendor;
    
    function productInfo()
    {
        parent::productInfo();
        echo '------------------------------ ' . $this->color . EOL;
        echo 'Лицензия: ' . $this->color . EOL;
        echo 'Тестовый период: ' . $this->weight . EOL;
        echo 'Операционная система: ' . $this->state_labels[$this->state] . EOL;
        echo 'Производитель: ' . $this->price . EOL;        
    }
    
}

/**
 * Ответ на вопрос № 5 ДЗ урока 1.
 */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x . EOL;
    }
}
class B extends A {
}
$a1 = new A(); 
$b1 = new B();
$a1->foo(); // 1 - выводится статическая переменная х объекта а класса А
$b1->foo(); // 1 - выводится статическая переменная х объекта b класса В
$a1->foo(); // 2 - выводится статическая переменная х объекта a класса А
$b1->foo(); // 2 - выводится статическая переменная х объекта b класса В