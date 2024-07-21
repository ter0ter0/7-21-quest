<?php
echo "攻撃値を入力して下さい:";

$attack = trim(fgets(STDIN));

function attack($point){
    echo "攻撃".$point."ダメージ";
}
attack($attack);

?>