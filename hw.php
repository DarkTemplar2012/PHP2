<?php
abstract class Goods
{
    abstract public function GetPrice();
    abstract public function GetGain();
}

class PhysicalGoods extends Goods
{
    private $name;
    private $money;
    private static $count;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function setMoney($money)
    {
        $this->money = $money;
    }
    public function GetPrice()
    {
        echo 'У товара ' . $this->getname() . ' стоимость '. $this->getMoney() / 2 . ' за полцены <br>';
        $this->GetGain();
    }
    public function GetGain()
    {
        self::$count++;
        echo 'Итого проданно товаров ' . self::$count . ' на сумму '. self::$count * $this->getMoney() . '<hr>';
    }
}
class OnceGoods extends Goods
{
    private $name;
    private $money;
    private static $count;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function setMoney($money)
    {
        $this->money = $money;
    }
    public function GetPrice()
    {
        echo 'У товара ' . $this->getname() . ' стоимость '. $this->getMoney() . '<br>';
        $this->GetGain();
    }
    public function GetGain()
    {
        self::$count++;
        echo 'Итого проданно товаров ' . self::$count . ' на сумму '. self::$count * $this->getMoney() . '<hr>';
    }
}
class WeightedGoods extends Goods
{
    private $name;
    private $money;
    private $weight;
    private static $count;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getMoney()
    {
        return $this->money;
    }
    public function setMoney($money)
    {
        $this->money = $money;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function GetPrice()
    {
        echo 'Товар ' . $this->getname() . ' весом '. $this->getWeight() .'кг. стоит '. $this->getMoney() * $this->getWeight() . '<br>';
        $this->GetGain();
    }
    public function GetGain()
    {
        self::$count++;
        echo 'Итого проданно товаров ' . self::$count . ' на сумму '. self::$count * $this->getMoney() . '<hr>';
    }
}

$PG = new PhysicalGoods();
$PG->setName('Acer');
$PG->setMoney(1000);
$PG->GetPrice();
$PG2 = new PhysicalGoods();
$PG2->setName('Acer');
$PG2->setMoney(1000);
$PG2->GetPrice();

$OG = new OnceGoods();
$OG->setName('Asus');
$OG->setMoney(1000);
$OG->GetPrice();

$WG = new WeightedGoods();
$WG->setName('ОЗУ');
$WG->setMoney(1000);
$WG->setWeight(1.5);
$WG->GetPrice();


// подсмотрел в интернете)) проверяем переменную если есть(и она статик) то её и возвращаем если нет делаем её статик
trait SingletonTrait
{
    private static $instances = [];
    public static function single()
    {
        if (!isset(self::$instances[static::class])) {
            self::$instances[static::class] = new static;
        }

        return self::$instances[static::class];
    }
}

class Test
{
    use SingletonTrait;
    public $value = 0;
}

$a = Test::single();
echo $a->value; // выведет 0

$a->value = 5;
echo $a->value; // выведет 5

$b = Test::single();
echo $b->value; // выведет 5

