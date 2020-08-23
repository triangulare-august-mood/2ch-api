<?php

include_once "VichanBase.php";

class Fourchan extends VichanBase {
    public function setBoard($board) {
        $this->board = $board;
        $this->url = "https://a.4cdn.org/".$this->board."/";
    }

    function __construct($board) {
        parent::__construct($board);
    }
        
    public function getThreadList(array $filter=[]) {
        $catalog = $this->getCatalog();
        $threadList = [];
        for ($i=0; $i < count($catalog); $i++) { 
            foreach ($catalog[$i]["threads"] as $thread) {
                array_push($threadList, $thread);
            }
        }
        if (count($filter) != 0) return $this->filterThreadList($threadList, "com", $filter, "no");
        return $threadList;
    }

    public function getThreadFiles($num) {

    }
}

$fourch = new Fourchan("s");

// dump( $fourch->getThreadList(['fap']) );
// dump( $fourch->getThread("19749508") );

$arr = $fourch->getThread("19749508");

foreach ($arr as $key => $value) {
    echo $key;
}