<?php 

#自販機クラス
class VendingMachine //設計図　自販機を作る。
{
    #プロパティ（インスタンスが持つ情報）=メンバ変数　（共通する属性）
    public $drink; //
    public $brandName; //ドリンクのブランド。
    public $coinStock;//コイン
    public $cupStock = 0;

    #メソッド（インスタンスが持つ処理のまとまり）=メンバメソッド（操作）

    //ドリンクを出す関数
    public function pressButton(Item $item) { 
        if ($item instanceof CupCoffee && $this->cupStock <= 0) {
            return "カップがありません。\n";
        }

        if($this->coinStock >= $item->price){ //coinStockがitem->price以上の場合処理する。
            $this->coinStock -= $item->price;//
            
            if($item instanceof CupCoffee){ //Itemのインスタンスの場合処理する。
                $this->cupStock--; //カップの個数を１個減らす。
            }

            return $item->name."を出します。". "\n"."残金が". $this->coinStock. "円となりました。"; //サイダーを出力し、残金を表示する。
        }
        else{ //100円ない場合処理する。
            return "100円ありません。\n";
        }    
    } 

    //カップの在庫管理
    public function addCup($num){
        $this->cupStock = min($this->cupStock + $num,100);
        echo "カップの在庫が".$this->cupStock. "になりました。";
    

    }

    //ドリンクのブランドを出す関数。
    //public function pressDrinkName(){ 
    //    return $this->brandName; //このメソッドが呼び出されると、brandName プロパティの値を返す。
    //}
    
    //コインを入れることのできる関数。
    public function depositCoin($coin){ //100円以外のコインは入れられず、100円コインが入れられると自動販売機に金額が貯まる。
        
        if($coin === 100 ){ //$coinが100円の場合。
            $this->coinStock += $coin; //$coinを入れる度にcoinStockに加算される。
            echo "コインが". $this->coinStock. "円貯まっています\n";
        }
        else{ //$coinが100円以外の場合。
            echo $coin."円です。100円を入れて下さい";
        }

    }


    #コンストラクタ
    public function __construct($brandName) { //インストラクタ時に実行される関数。コンストラクタ。($brandName): インスタンスを作成するときに渡される引数。
       $this->brandName  = $brandName; //クラスのプロパティ brandName に、渡された $brandName を設定します。
       //echo "ブランドネームは". $this->brandName . "です！";  
    }
}


#アイテムクラス
class Item //アイテムクラス
{
    #プロパティ
    //ドリンクのメニュー（サイダーかコーラか）
    public $name;
    public $price;
    
    #メソッド
    //ドリンクを選択する関数。
    public function __construct($name,$price){
        $this->name = $name;
        $this->price = $price;
    }
    
}


#カップコーヒークラス
class CupCoffee extends Item
{
    public function __construct($name,$price){
    parent::__construct($name,$price);
    echo "カップコーヒーの". $this->name. "が選ばれました。値段は". $this->price. "円です。\n";
        

    }
}



#クラスからインスタンスという実際に使える「モノ」を作る。（動的）。インスタンス化
$VendingMachine = new VendingMachine("サントリー"); //このコードにより、$vendingMachine インスタンスの brandName プロパティが "サントリー" に設定される。
$cola = new Item("cola",150);//colaのインスタンスを作成。
$cider = new Item("cider",100);//ciderのインスタンスを作成。
$hotCupCoffee = new CupCoffee("hot",100);//カップコーヒーのインスタンスを作成。
$iceCupCoffee = new CupCoffee("ice",100)

//コンストラクタ出力
//echo "ブランドネームは". $VendingMachine->pressDrinkName(). "です。\n"; //このコードを実行すると、インスタンス作成時に設定された brandName（例では "サントリー"）が返され、出力される。


#通常出力
//$VendingMachine->drink = "ジュース"; //drinkの種類はジュース。
//$VendingMachine-> pressButton(); //pressButtonの関数を実行する。
$VendingMachine-> depositCoin(100);//depositCoinの関数を実行する。()は引数。
$VendingMachine-> depositCoin(100);
//echo $VendingMachine->pressButton($cola);//pressButtonを出力する。
echo $VendingMachine->pressButton($cider);
echo $vendingMachine->pressButton($hotCupCoffee);
echo $vendingMachine->pressButton($iceCupCoffee);
$vendingMachine->addCups(5);
echo $vendingMachine->pressButton($iceCupCoffee);



//インスタンスを見える化する。
print_r($VendingMachine); 
echo "\n"; //改行する。
?>