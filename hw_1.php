<?php
// ДЗ 1 2 3 4
class Goods
{
    protected $name;
    protected $description;
    protected $price;

    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDiscount()
    {
        echo "Товар ".$this->getName()."(".$this->getDescription().") стоит со скидкой ".$this->getPrice()."<hr>";
    }
}

class Notebook extends Goods
{
    protected $specification;
    public function __construct($name, $description, $price, $specification)
    {
        parent::__construct($name, $description, $price);
        $this->specification = $specification;
    }
    public function getSpecification()
    {
        return $this->specification;
    }
    public function setSpecification($specification)
    {
        $this->specification = $specification;
    }
    public function setDiscount()
    {
        echo "Товар ".$this->getName()."(".$this->getDescription().". C харктеристиками: ".$this->getSpecification().") стоит со скидкой ".$this->getPrice()."<hr>";
    }
};
$good = new Goods("Acer", "Просто Acer", 1000);
$notebook = new Notebook("Acer", "Лучший для учёбы", 1000, "CPU: i7, ОЗУ: 8гб, SSD: 120гб");
$good->setDiscount();
$notebook->setDiscount();

//ДЗ 5
// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// //здесь будет 1 так как x static и принадлежит классу и мы делаем инкремент именно в класе и не в обьекте
// $a1->foo();
// //здесь будет 2
// $a2->foo();
// //здесь будет 3
// $a1->foo();
// //здесь будет 4
// $a2->foo();

// // ДЗ 6
// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A
// {
// }
// $a1 = new A();
// $b1 = new B();
// //здесь будет 1 мы имеем 2 экзепляра класса и соответсвенно делаем инкремент в каждом классе отдельно
// $a1->foo();
// //здесь будет 1
// $b1->foo();
// //здесь будет 2
// $a1->foo();
// //здесь будет 2
// $b1->foo();

// //ДЗ 7 точь в точь как 6 задание скобки в данном случае не важны так как нет конструктораи ничего не менятся. есть только метод который мы вызовем позже сами)))
// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A
// {
// }
// $a1 = new A;
// $b1 = new B;
// $a1->foo();
// $b1->foo();
// $a1->foo();
// $b1->foo();

// ДЗ из вашей призентации.
// в конструкторе вызываем перебор массива и запускаем для каждого элемента  метод toPow он возвращает число возведённое в сетпень
// и его добавляем в результирующий массив.
// Не понятно только почему когда в подклассе переопределяю метод то PHP ругается что надо 2 аргумента, хотя я явно указал один(пришлось null указать), тем не менее код работает
// Думаю что в конструкторе родителя идёт вызов метода)))
class Pow
{
    public $arr;
    public $num;
    public static $res;
    public function __construct($arr, $num)
    {
        $this->arr = $arr;
        $this->num = $num;
        $this->arrayTraversal($this->arr, $this->num);
    }
    public function arrayTraversal($arr, $num)
    {
        // static $res = array();
        foreach ($arr as $key => $value) {
            Pow::$res[] = $this->toPow($value, $num);
        }
        print_r(Pow::$res);
    }
    public function toPow($arr, $num)
    {
        if ($num > 0) {
            return $arr * $this->toPow($arr, $num - 1);
        }
        return 1;
    }
}

class Mult extends Pow
{
    public function __construct($arr, $num)
    {
        parent::__construct($arr, $num);
        print_r($this->arrayTraversal(Pow::$res, null));
    }
    public function arrayTraversal($arr, $num)
    {
        $res = array();
        foreach ($arr as $key => $value) {
            $res[] = $this->toMult($value);
        }
        return ($res);
    }
    public function toMult($num)
    {
        return $num * 2;
    }
}
new Pow([2,3,4,5], 3);
new Mult(Pow::$res, null);
