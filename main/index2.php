<?php

class Product
{
    public $name;

    public function __construct()
    {
        echo "Bu ota class";
    }

    public function getName()
    {
        echo $this->name;
    }
}

class Notebook extends Product
{

    public $price;

    public function __construct()
    {
        parent::__construct();
        echo '<br>';
        echo "Bu bola klass";
    }

    public function getPrice()
    {
        echo $this->price;
    }
}
$product = new Notebook();
$product->name = 'Hp Pavilion';
$product->price = '1200$';
echo '<br>';
$product->getName();
echo '<br>';
$product->getPrice();
echo '<br>';
