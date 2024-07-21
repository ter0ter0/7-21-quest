<?php

#カードクラス
class Card {
    public $suit; // トランプのマーク
    public $num;  // トランプの数字

    public function __construct($a, $b) {//インスタンス時に生まれる。ばぶー
        $this->suit = $a; // $aに入れたものが$suit(マーク)になる
        $this->num = $b;  // $bに入れたものが$num(数字)になる
    }

    public function getCard() { // 数字を作るのとカードを表示する
        $numbers = [1=>"2", 2=>"3", 3=>"4", 4=>"5", 5=>"6", 6=>"7", 7=>"8", 8=>"9", 9=>"10", 10=>"J", 11=>"Q", 12=>"K", 13=>"A"];
        return "{$this->suit}の{$numbers[$this->num]}"; // 「マークの数字」
    }
}

#デッキクラス
class Deck {
    public $deck = []; // 全てのカード

    public function __construct() {
        $suits = ["ハート", "ダイヤ", "スペード", "クローバー"];
        foreach ($suits as $suit) {//suitにマークが入るじゃん？それを↓
            for ($num = 1; $num <= 13; $num++) {//1~13作成して各マークに入れる。
                $this->deck[] = new Card($suit, $num); // カードをデッキに入れる
            }
        }
        shuffle($this->deck); // デッキをシャッフル
    }

    public function deal() { // カードを配る
        return array_splice($this->deck, 0, 26); // デッキの26枚目まで配る
    }
}

#プレイヤークラス
class Player {
    public $name; // プレイヤーネーム
    public $hand; // プレイヤーの手札

    public function __construct($c, $d) {
        $this->name = $c; // $cに入れた名前が$nameに入る
        $this->hand = $d; // $dに入れた$dealが$handに入る
    }

    public function drawCard() { // カードをドロー
        return array_shift($this->hand);
    }

    public function addCards($deck) {//カードを追加していく。はず
        $this->hand = array_merge($this->hand, $deck);
    }
}

#ゲームの進行
function playWar($player1, $player2) {
    echo "戦争を開始します\n";
    echo "カードが配られました\n";

   

    while (count($player1->hand) > 0 && count($player2->hand) > 0) { // どちらかの手札がなくなるまで繰り返す。はず
        echo "戦争\n";

        // プレイヤークラスのメソッドを発動し$cardにぶち込む
        $card1 = $player1->drawCard();
        $card2 = $player2->drawCard();

        // 手札を表示
        echo "{$player1->name}のカードは{$card1->getCard()}です。\n"; // Cardクラスのメソッドを発動
        echo "{$player2->name}のカードは{$card2->getCard()}です。\n"; // Cardクラスのメソッドを発動


        // カードの強さ比べ
        if ($card1->num > $card2->num) {
            echo "{$player1->name}が勝ちました。\n";
           
            echo "カードが追加されました。\n";
        } elseif ($card1->num < $card2->num) {
            echo "{$player2->name}が勝ちました。\n";
       
            echo "カードが追加されました。\n";
        } else {
            echo "引き分けだよ。\n";
            // 引き分け時の処理
            if (count($player1->hand) > 1 && count($player2->hand) > 1) {
                $warPile[] = $player1->drawCard(); // 追加のカードを引く
                $warPile[] = $player2->drawCard();
            } else {
                break; // どちらかのプレイヤーの手札が不足した場合、ループを終了
            }
        }
    }
    echo "戦争終了！\n";

    if (count($player1->hand) > 0) {
        echo "{$player1->name}の手札が" . count($player1->hand) . "枚で勝利です！\n";
    } else {
        echo "{$player2->name}の手札が" . count($player2->hand) . "枚で勝利です！\n";
    }
}

#ゲームの実行
$deck = new Deck();
$player1 = new Player("サトシ", $deck->deal()); // Playerをインスタンス化して引数に名前と手札を入れる
$player2 = new Player("タケシ", $deck->deal());

playWar($player1, $player2); // 関数実行

?>