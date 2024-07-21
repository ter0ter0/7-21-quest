<?php 
class VendingMachine //設計図
{
    public $juice; //メンバ変数　（共通する属性）
    public $makerName;

    public function pressButton() { //メンバメソッド（操作）
        echo "cider". "\n"; //サイダー

    } 

    public function pressManufacturerName(){ //メンバメソッド（操作）
        echo "メーカー名確認ボタンを押します。\n"."メーカー名は"
    }
    

    public function __construct($makerName){ //インストラクタ時に実行される関数。//コンストラクタ
        $this->$makerName = pressManufacturerName;

                
    }

    //function pressManufacturerName($name){ //メンバメソッド　メーカーネーム。
        //echo "メーカーネームは". $name. "です。";

    //}

}

$VendingMachine = new VendingMachine("サントリー"); //クラスをオブジェクト化して使用（動的）。

$VendingMachine->juice = 20; //juiceの本数は20本。

print_r($VendingMachine); //クラスを見える化する。
echo "\n"; //出力する。

$VendingMachine->pressButton();
$VendingMachine->pressManufacturerName();


?>