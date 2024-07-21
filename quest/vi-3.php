<?php
#2つのブーリアン値 x と y が与えられ、x と y のうちどちらかが真なら true を出力し、
#両方真もしくは両方偽なら false を出力する関数 xor を定義してください。

    echo "真偽を出力します\n";
    echo "xの真偽を選択して下さい: true or false :";
    $x = fgets(STDIN);
    echo "yの真偽を選択して下さい: true or false :";
    $y = fgets(STDIN);


function num($x,$y){
    if($x == true && $y == true){
        return "false";
    }
    elseif($x == true || $y == true){
        return "true";
    }
    elseif($x == false && $y == false){
        return "false";
    }
    else{
        echo "入力が違います";
    }
}

    echo "真偽は" . num($x, $y) . "です";


?>