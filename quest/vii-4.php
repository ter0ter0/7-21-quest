<?php
#2つの整数 x と y が与えられ、
#x から y までの足し算の結果を出力する関数 sum を定義してください。

echo "xを入力して下さい:";
$x = intval(fgets(STDIN));

echo "yを入力して下さい:";
$y = intval(fgets(STDIN));


#関数sumを定義して、仮引数をxとyにする。
function sum($x,$y){

    #totalを保持する変数。
    $total = 0;
    #xをiとして、i以上y以下まで加算する。iは１ずつ加算する。
    for($i = $x; $i <= $y; $i ++){

        #例　total(10)=total(0)+i(10) →　total(21)=total(10)+i(11)
        $total += $i . "\n"; //合計にiを加算。
    }
        echo "合計:" . $total . "\n";

}
#関数sumを実行する。引数はxとyとする。
sum($x,$y);


?>