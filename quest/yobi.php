<?php
// Cardクラスの定義
class Card {
    private $suit; // スート
    private $number; // 数字

    // コンストラクタ
    public function __construct($suit, $number) {
        $this->suit = $suit;
        $this->number = $number;
    }

    // カードの数字を取得
    public function getNumber() {
        return $this->number;
    }

    // カードの表示
    public function display() {
        return "{$this->number} of {$this->suit}";
    }
}

// Deckクラスの定義
class Deck {
    private $cards; // カードの配列

    // コンストラクタ
    public function __construct() {
        $this->initializeDeck();
    }

    // デッキの初期化
    private function initializeDeck() {
        $suits = array('Hearts', 'Diamonds', 'Clubs', 'Spades'); //配列
        $numbers = array('Ace', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King');//配列
        $this->cards = array();//
        foreach ($suits as $suit) {
            foreach ($numbers as $number) {
                $this->cards[] = new Card($suit, $number);
            }
        }
        shuffle($this->cards);
    }

    // カードを配る
    public function dealCards($players) {
        $hands = array();
        for ($i = 0; $i < $players; $i++) {
            $hands[$i] = array();
        }
        while (!empty($this->cards)) {
            foreach ($hands as $player => $hand) {
                $card = array_shift($this->cards);
                $hands[$player][] = $card;
            }
        }
        return $hands;
    }
}

// WarGameクラスの定義
class WarGame {
    private $players = 2;
    private $deck;
    private $hands;
    private $tableCards;

    // コンストラクタ
    public function __construct() {
        $this->deck = new Deck();
        $this->hands = $this->deck->dealCards($this->players);
        $this->tableCards = array();
    }

    // ゲームを実行する
    public function play() {
        $round = 1;
        while ($this->enoughCards()) {
            echo "Round $round: War!\n";

            // 各プレイヤーがカードを出す
            $playedCards = array();
            foreach ($this->hands as $player => $hand) {
                $card = array_shift($hand);
                echo "Player " . ($player + 1) . " plays: " . $card->display() . "\n";
                $playedCards[$player] = $card;
                $this->tableCards[] = $card;
            }

            // 勝者を決定する
            $winner = $this->determineWinner($playedCards);
            echo "Player " . ($winner + 1) . " wins this round!\n";

            // 勝者が場札を引き取る
            shuffle($this->tableCards); // 場札をシャッフル
            foreach ($this->tableCards as $card) {
                $this->hands[$winner][] = $card;
            }
            $this->tableCards = array(); // 場札をクリア

            $round++;
        }

        // ゲーム終了時の勝者を表示
        echo "Player " . ($winner + 1) . " wins the game!\n";
    }

    // カードの強さを比較して勝者を決定する
    private function determineWinner($playedCards) {
        $rankOrder = array('Ace', 'King', 'Queen', 'Jack', '10', '9', '8', '7', '6', '5', '4', '3', '2');
        $maxRank = -1;
        $winner = -1;
        foreach ($playedCards as $player => $card) {
            $rank = array_search($card->getNumber(), $rankOrder);
            if ($rank > $maxRank) {
                $maxRank = $rank;
                $winner = $player;
            }
        }
        return $winner;
    }

    // 手札が十分に残っているかチェックする
    private function enoughCards() {
        foreach ($this->hands as $hand) {
            if (empty($hand)) {
                return false;
            }
        }
        return true;
    }
}

// ゲームを開始する
$game = new WarGame();
$game->play();
?>
