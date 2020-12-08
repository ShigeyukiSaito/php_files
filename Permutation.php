<?php
$array = explode(" ", trim(fgets(STDIN)));//array_map("intval", explode(" ", trim(fgets(STDIN))));
//$r = intval(trim(fgets(STDIN))); //選ぶ個数
$n = count($array);

$result = array_fill(0, $n-1, null); //組み合わせのパターンを一時保存しておく
$results = []; //組み合わせのパターンを永久保存する

//与えられた配列で全列挙
function Permutation($array, $i=0) {
    global $n, $result, $results;
    // 昇順にする
    sort($array);

    if(count($array) === 0) {
        //$results = array_diff($results, [$result]); //これでダブリ削除しようとおもったけどダメだった。
        //resultsの中から、resultと重複するものを削除
        for($i=0; $i<count($results); $i++) {
            if($results[$i] === $result) { array_splice($results, $i, 1);}
        }
        $results[]= $result;
    } else {
        foreach($array as $a) {
            if($result[$i] !== $a) {//foreachの$aが変わるタイミングで、resultのi番目の要素を$aに揃える。
                $result[$i] = $a;
            }
            $result = array_slice($result, 0, $i+1);
            $result = array_merge($result, array_fill(0, $n-1-$i, null)); 

            // 削除対象の要素のキーを特定
            $key = array_search($a, $array);
            // $arrayをspliceしてしまうと、一番上のforeachに戻る際にarrayが失われてしまうので、
            // $arrayの代わりにdiff_arrayを宣言。
            $diff_array = $array;
            array_splice($diff_array, $key, 1);

            Permutation($diff_array, $i+1);
        }
    }
    return $results;
}

//場合の数と、全てのパターンを表示する。
function ViewArrays($array) {
    foreach($array as $a) {
        echo '['.implode(", ", $a).']'.PHP_EOL;
    }
    echo count($array)."通り".PHP_EOL;
}

ViewArrays(Permutation($array));