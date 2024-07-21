<?php
function fizz_buzz(){
    
echo "数値を出力します\n";

#数字を1から100まで順番に出力する
    for($i = 1; $i <= 100; $i ++ ) {

        #3かつ5の倍数の時「FizzBuzz」と出力する
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz\n";
        }

        #3の倍数の時「Fizz」と出力する
        elseif ($i % 3 == 0) {
            echo "Fizz\n";
        }

        #5の倍数の時「Buzz」と出力する
        elseif ($i % 5 == 0) {
            echo "Buzz\n";
        
        }
        else {
            echo $i . "\n" ;

        }
    }
}

fizz_buzz();

?>