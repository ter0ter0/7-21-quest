<?php
#配列
echo "<配列>\n";
$box = array("apple","banana");
echo $box[1]."\n";
$box[] = "orange\n";
echo $box[2];


?>

<?php
echo "<連想配列>\n";
#連想配列

$box = array(1=>"apple",2=>"banana");
    echo $box[1]."\n";
    $box[3] = "orange";
    echo $box[3]."\n";


?>

<?php
#配列+foreach
echo "<配列+foreach>\n";

$box = array("apple","banana");
foreach ($box as $box2){
echo $box2."\n";
}

?>


<?php
#連想配列+foreach

function print_names($name){

echo "<連想配列+foreach>\n";
//echo "nameを入力して下さい。\n";
//$name1=fgets(STDIN);
//$name2=fgets(STDIN);

$box = array(1.=>$name[0],2.=>$name[1]);
    foreach($box as $num => $box2){
    echo $num.":".$box2."\n";
    }

}
print_names(["take","ari"]);
?>


<?php
#連想配列+foreach

function print_name(){

echo "<連想配列+foreach>\n";
echo "nameを入力して下さい。\n";
$name1=fgets(STDIN);
$name2=fgets(STDIN);

$box = array(1.=>$name1,2.=>$name2);
    foreach($box as $num => $box2){
    echo $num.":".$box2."\n";
    }

}
print_name();
?>


