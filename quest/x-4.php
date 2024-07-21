<?php 

#クラス
class VendingMachine //設計図　自販機を作る。
{
    #プロパティ（インスタンスが持つ情報）=メンバ変数　（共通する属性）
    public $drink; //
    public $drinkName; //ドリンクのブランド。
    public $coinStock;//コイン

    #メソッド（インスタンスが持つ処理のまとまり）=メンバメソッド（操作）

    //ドリンクを出す関数
    public function pressButton(Item $item) { 
        if($this->coinStock >= $item->price){ //coinStockがitem->price以上の場合処理する。
            $this->coinStock -= $item->price;
            return $item->name."を出します。". "\n"."残金が". $this->coinStock. "円となりました。"; //サイダーを出力し、残金を表示する。
        }
        else{ //100円ない場合処理する。
            return "100円ありません。\n";
        }
    } 

    //ドリンクのブランドを出す関数。
    public function pressDrinkName(){ 
        return $this->drinkName; //このメソッドが呼び出されると、drinkName プロパティの値を返す。
    }
    
    //コインを入れることのできる関数。
    public function depositCoin($coin){ //100円以外のコインは入れられず、100円コインが入れられると自動販売機に金額が貯まる。
        
        if($coin === 100 ){ //$coinが100円の場合。
            $this->coinStock += $coin; //$coinを入れる度にcoinStockに加算される。
            echo "コインが". $this->coinStock. "円貯まっているので\n";
        }
        else{ //$coinが100円以外の場合。
            echo $coin."円です。100円を入れて下さい";
        }

    }

    #コンストラクタ
    public function __construct($drinkName) { //インストラクタ時に実行される関数。コンストラクタ。($drinkName): インスタンスを作成するときに渡される引数。
       $this->drinkName  = $drinkName; //クラスのプロパティ drinkName に、渡された $drinkName を設定します。
       //echo "ブランドネームは". $this->drinkName . "です！";  
    }
}


#クラス
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


#クラスからインスタンスという実際に使える「モノ」を作る。（動的）。インスタンス化
$cola = new Item("cola",150);//colaのインスタンスを作成。
$cider = new Item("cider",100);//ciderのインスタンスを作成。

$VendingMachine = new VendingMachine("サントリー"); //このコードにより、$vendingMachine インスタンスの drinkName プロパティが "サントリー" に設定される。
//コンストラクタ出力
echo "ブランドネームは". $VendingMachine->pressDrinkName(). "です。\n"; //このコードを実行すると、インスタンス作成時に設定された drinkName（例では "サントリー"）が返され、出力される。

#通常出力
$VendingMachine->drink = "ジュース"; //drinkの種類はジュース。
//$VendingMachine-> pressButton(); //pressButtonの関数を実行する。
$VendingMachine-> depositCoin(100);//depositCoinの関数を実行する。()は引数。
$VendingMachine-> depositCoin(100);
//echo $VendingMachine->pressButton($cola);//pressButtonを出力する。
echo $VendingMachine->pressButton($cider);

print_r($VendingMachine); //インスタンスを見える化する。
echo "\n"; //改行する。
?>