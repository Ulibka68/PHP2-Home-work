<?php
/**
 * Created by PhpStorm.
 * User: Gayrat
 * Date: 28.09.2018
 * Time: 17:39
 */

//1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
//2. Описать свойства класса из п.1 (состояние).
//3. Описать поведение класса из п.1 (методы).
//4. Придумать наследников класса из п.1. Чем они будут отличаться?

class core {
    public $id; // описание сущности

}

class product extends core {
    public $prodname;
    public function __construct() { $this->id="продукт";}
}

class price extends core {
    public $product; // переменна класса product
    public $price;  // цена
    public function __construct($pr,$cen) {
        $this->id="ценник";
        $this->product=$pr;
        $this->price=$cen;
    }
}