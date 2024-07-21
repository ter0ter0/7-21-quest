<?php 
    #foreach

    function print_names($name){
    
        $names = array(1.=>$name[0],2.=>$name[1]);
        foreach($names as $num=>$name2){
        echo $num.":".$name2."\n";

        }
    }
    print_names(["take","ari"]);

?>

<?php
#array_map
echo "数値を入力して下さい.\n";
$i1  = trim(fgets(STDIN));
$i2  = trim(fgets(STDIN));
$i3  = trim(fgets(STDIN));

function square($numbers){
    return($numbers * $numbers);
}
$num=[$i1,$i2,$i3];
//$num=[5,7,10];

$total=array_map("square",$num);
print_r($total);


?>

<?php
#array_filter

function filter($numbers){
    return($numbers % 2 == 0);
}
$num=[1,2,3,4,5,6,7,8,9,10];
$total=array_filter($num,"filter");

print_r($total);


?>

