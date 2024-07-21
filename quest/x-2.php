<?php 
class VendingMachine //設計図　自販機を作る。
{
    #プロパティ（インスタンスが持つ情報）=メンバ変数　（共通する属性）
    public $drink; //
    public $drinkName; //ドリンクのブランド。

    #メソッド（インスタンスが持つ処理のまとまり）=メンバメソッド（操作）
    public function pressButton() { //ボタンを押す関数
        echo "cider". "\n"; //サイダーを出力
    } 

    public function pressDrinkName(){ //ドリンクのブランドを出す関数。
        return $this->drinkName; //このメソッドが呼び出されると、drinkName プロパティの値を返す。
    }
    
    public function __construct($drinkName) { //インストラクタ時に実行される関数。コンストラクタ。($drinkName): インスタンスを作成するときに渡される引数。
       $this->drinkName  = $drinkName; //クラスのプロパティ drinkName に、渡された $drinkName を設定します。
       //echo "ブランドネームは". $this->drinkName . "です！";  
    }
}

#クラスからインスタンスという実際に使える「モノ」を作る。（動的）。インスタンス化
$VendingMachine = new VendingMachine("サントリー"); //このコードにより、$vendingMachine インスタンスの drinkName プロパティが "サントリー" に設定される。

echo "ブランドネームは". $VendingMachine->pressDrinkName(). "です"; //このコードを実行すると、インスタンス作成時に設定された drinkName（例では "サントリー"）が返され、出力される。

$VendingMachine->drink = "ジュース"; //drinkの種類はジュース。

print_r($VendingMachine); //インスタンスを見える化する。
echo "\n"; //出力する。

$VendingMachine-> pressButton(); #pressButtonの関数を実行する

?>