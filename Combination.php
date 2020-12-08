<?php
$array = explode(" ", trim(fgets(STDIN)));//array_map("intval", explode(" ", trim(fgets(STDIN))));
$r = intval(trim(fgets(STDIN))); //選ぶ個数
$n = count($array);

$result = array_fill(0, $n-1, null); //組み合わせのパターンを一時保存しておく
$results = []; //組み合わせのパターンを永久保存する

// 配列の要素集合が等しいかどうか判定する。
function array_equal($a, $b) {
    sort($a);
    sort($b);
    if($a === $b) {
        return 1;
    } else {
        return 0;
    }
}

//組み合わせを配列として返す
function Combination($array, $r, $i=0) {
    global $n, $result, $results;
    if($r > $n || $r < 0) {exit("組み合わせは存在しません。".PHP_EOL);}

    foreach($array as $key=>$value) {
        //探索の手間を省くための処理。
        if($i === 0 && $key > $n-$r) {
            break;
        }
        $result[$i] = $value; //組み合わせのiつ目を$valueとする。

        if($i < $r-1) {
            // 探索範囲を狭める処理。iつ目以降は、iつ目の数の右隣の要素群から探す。
            $array_1 = array_slice($array, $key+1);
            // 再帰化
            Combination($array_1, $r, $i+1);
        } else {
            // resultsの中で、resultと重複するものがあった場合は、resultsに含めない。
            // 重複のあるなしは、checkedで管理する。（重複あり：checked=1,　なし：checked=0） 
            $checked = 0;
            for($j=0; $j<count($results); $j++) {
                if(array_equal($results[$j], $result)) { 
                    $checked = 1;
                    break;
                }
            }
            if($checked === 0) {$results[] = $result;}
        }
    }
    return $results;
}

//組み合わせの数と、全てのパターンを表示する。
function ViewArrays($array) {
    foreach($array as $a) {
        echo '['.implode(", ", $a).']'.PHP_EOL;
    }
    echo count($array)."通り".PHP_EOL;
}

ViewArrays(Combination($array, $r));