<?php
#1 から 100 までの足し算の結果を出力する関数 sum_1_100 を定義してください。
#関数sum1_100を定義。引数はなし
function sum_1_100(){
    #nを0とする
        $n = 0;
    #iを１とし１から100まで加算する。
    for($i = 1; $i <= 100; $i ++){
        #nとiを足して答えをnとする。iが100まで繰り返す。
        #例　n(1)=n(0)+i(1)　→　n(3)=n(1)+i(2)
        echo $n = $n + $i . "\n";

    }

}
#関数を呼び出す。
sum_1_100();
?>