<?php
$results_all =[];
$array = /*[1, 1, 2, 3];*/array_map("intval", explode(" ", trim(fgets(STDIN))));
//$r = intval(trim(fgets(STDIN)));
$n = count($array);
$result = array_fill(0, $n-1, null);
$results = [];

//組み合わせ
function Combination($array, $r, $i=0, $a) {
    global $result, $results;

    for($b=$a+1; $b<=count($array)-$r+$i; $b++) { //$a=$iはダメ
        $result[$i] = $array[$b];

        if($i === $r-1) {
            //resultsの中から、resultと重複するものを削除
            for($j=0; $j<count($results); $j++) {
                if($results[$j] === $result) { array_splice($results, $j, 1);}
            }
            $results[] = $result;
            return 0;
        }
        Combination($array, $r, $i+1, $b);
    }
    return $results;
}

// 3つの組み合わせを選ぶ処理をforだけで書くとこうなる
for($a=0; $a<=count($array)-$r; $a++) {
    $result[0] = $array[$a];
    for($b=$a+1; $b<=count($array)-$r+1; $b++) {
        $result[1] = $array[$b];
        for($c=$b+1; $c<=count($array)-$r+2; $c++) {
            $result[2] = $array[$c];
            //resultsの中から、resultと重複するものを削除
            for($i=0; $i<count($results); $i++) {
                if($results[$i] === $result) { array_splice($results, $i, 1);}
            }
            $results[] = $result;
        }
    }    
}

//forではなく、foreachで実装してみる。
foreach($array as $a) {
    if($a > $n-$r+1) {
        break;
    }
    $result[0] = $a;
    $key = array_search($a, $array);
    $array_1 = array_slice($array, $key+1);
    
    foreach($array_1 as $b) {
        $result[1] = $b;
        $key_1 = array_search($b, $array_1);
        $array_2 = array_slice($array_1, $key_1+1);
        
        foreach($array_2 as $c) {
            $result[2] = $c;
            //resultsの中から、resultと重複するものを削除
            for($i=0; $i<count($results); $i++) {
                if(array_equal($results[$i], $result)) { 
                    //array_splice($results, $i, 1);
                    $checked = 1;
                    break 2;
                }
            }
            $results[] = $result;
        }
    }
}

//与えられた配列で全列挙
function Permutation($array, $i=0) {
    global $n, $result, $results;
    // 昇順にする（キーと値の関係性は維持しない） 
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
            //$diff_array = array_diff($array, [$a]); //これだと、元の配列に重複があった場合、
            //Permutation($diff_array, $i+1); //重複した値が配列から一気に削除されてしまう。
        }
    }
    return $results;
}

function ViewArraysAndNumber($array) {
    foreach($array as $a) {
        echo '['.implode(", ", $a).']'.PHP_EOL;
    }
    echo count($array)."通り".PHP_EOL;
}

function array_equal($a, $b) {
    sort($a);
    sort($b);
    if($a === $b) {
        return 1;
    } else {
        return 0;
    }
    /* 以下の方法は、要素集合に対して行うもの（要素集合は、重複を含まない。）
    $diff_a_to_b = array_diff($a, $b); //diff b from a
    $diff_b_to_a = array_diff($b, $a); //diff a from b
    
    $emptyA = empty($diff_a_to_b); //true or false
    $emptyB = empty($diff_b_to_a); //true or false
    
    return $emptyA && $emptyB;
    */
}

ViewArraysAndNumber(Permutation($array));