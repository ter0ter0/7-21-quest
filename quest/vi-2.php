<?php
#東京駅から新宿駅までJR山手線に乗って移動します。
#12歳以上は大人料金で200円、6歳以上12歳未満はこども料金で100円、6歳未満は幼児で無料となります。
#年齢に応じて東京駅から新宿駅までの料金を出力する関数 train_fare を定義してください。
   
    echo "電車賃を出力します\n";
    echo "あなたの年齢は？" . ":";
    $age = fgets(STDIN);


    function train_fare($age){
        if(6 > $age){
            return "0";
        }
        elseif(6 <= $age && $age < 12){
            return "100";
        }
        elseif(12 <= $age){
            return "200";
        }
    }
    echo "あなたの電車賃は" . train_fare($age) . "円です。";
    
?>