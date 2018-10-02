<?php


/*1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза.
     У штучного товара обычная стоимость,
     у весового – в зависимости от продаваемого количества в килограммах.
    У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?
    2. *Реализовать паттерн Singleton при помощи traits.*/

require_once ('BasicEnum.php');

abstract  class  Good {
    public $quantity;
    public $price;
    public $unit ; // единица измерения
    public  $name; // String наименование товара
    public $purchase_price; // закупочная цена

    public function  __construct(float $q,float $pr, Unit $u, $n)
    {
        $this->price=$pr;
        $this->quantity=$q;
        $this->unit=$u;
        $this->name=$n;
    }

    public function TotalGross() {
        return $this->quantity*$this->price;
    }

    public function TotalProfit() {
        return $this->quantity*($this->price-$this->purchase_price);
    }

}

// enum для проверки типа аргумента
abstract class Unit extends BasicEnum {
    const Килограмм = 0,
        Штука = 1,
        Метр = 2,
        Набор = 3,
        Паллета = 4,
        Цифровой = 5;
}

class NormalGood extends  Good
{
}


// скоропортящиийся товар - мороженное
class Perishable extends  Good {
    // добавилось свойство процент потерь
    public $lostPercent;

    public function TotalProfit() {
        return $this->quantity*($this->price-$this->purchase_price)*(1-$this->lostPercent);
    }
}


$a= Unit::isValidName('Паллета');                   // true
var_dump($a);

$k=Unit::Паллета;
var_dump($k);