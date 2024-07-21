<?php 

# 自販機クラス
class VendingMachine {
    public $brandName;
    public $coinStock = 0;
    public $cupStock = 100; // 初期在庫数は100個

    public function pressButton(Item $item) { 
        if ($item instanceof CupCoffee && $this->cupStock <= 0) {
            return "カップがありません。\n";
        }
        
        if ($this->coinStock >= $item->price) { 
            $this->coinStock -= $item->price;
            
            if ($item instanceof CupCoffee) {
                $this->cupStock--; // カップコーヒーの場合、カップ在庫を1つ減らす
            }
            
            return $item->name . "を出します。\n残金が" . $this->coinStock . "円となりました。";
        } else {
            return "お金が足りません。\n";
        }
    }

    public function depositCoin($coin) { 
        if ($coin === 100) {
            $this->coinStock += $coin;
            echo "コインが" . $this->coinStock . "円貯まっています\n";
        } else {
            echo $coin . "円です。100円を入れて下さい\n";
        }
    }

    public function addCups($num) {
        $this->cupStock = min($this->cupStock + $num, 100); // 最大在庫数は100個
        echo "カップの在庫が" . $this->cupStock . "個になりました\n";
    }

    public function __construct($brandName) {
       $this->brandName = $brandName;
    }
}

# アイテムクラス
class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

# カップコーヒークラス
class CupCoffee extends Item {

}


class Snack extends Item{
}





# クラスのインスタンス化
$vendingMachine = new VendingMachine("サントリー");
$cola = new Item("cola", 150);
$cider = new Item("cider", 100);
$hotCupCoffee = new CupCoffee("hot",200);
$iceCupCoffee = new CupCoffee("ice",150);
$snack = new Snack("potate",150);

//お金を入れる
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
//商品を出す。
echo $vendingMachine->pressButton($cola);
echo $vendingMachine->pressButton($hotCupCoffee);
echo $vendingMachine->pressButton($iceCupCoffee);
echo $vendingMachine->pressButton($snack);

//カップを追加する。
$vendingMachine->addCups(5);

//echo $vendingMachine->pressButton($iceCupCoffee);

# インスタンスを見える化する
print_r($vendingMachine);
echo "\n"; //改行する
?>
