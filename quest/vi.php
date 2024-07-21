
<?php
#2つの整数 x, y の大小を比較し、xとyの大小関係を出力する関数 greater を定義してください。
#xよりyが大きければ「x > y」 xよりyが小さければ「x < y」 xとyの値が同じなら「x == y」

echo "2つの整数の大小を比較します\n";
echo "xの数値を入力して下さい" . ":" ;
$x = fgets(STDIN);
echo "yの数値を入力して下さい" . ":" ;
$y = fgets(STDIN);

function greater($x,$y){
    if($x > $y){
        return "x > y";
    }
    elseif($x < $y){
        return "x < y";
    }
    else{
        return "x == y";
    }

}
echo "結果 :" . greater($x,$y) . "です。";
?>

