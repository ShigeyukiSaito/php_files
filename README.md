# php_files
this repository is my PHP Library.
<br/>
<br/>

## file description
### Permutation.php
- if you standard input array, this code standard output return it's permutation array and the number of cases.
- this Supports duplicates and strings.
- 標準入力で配列を与えると、その順列と場合の数を全て標準出力します。
- 重複や文字列にも対応しています（ただし、要素の型は統一されていて欲しい）。

#### Input
Input is given from Standard Input in the following format:
```
1 2 3 //array(each value is separated by whitespace)
```

#### Output
```
[1, 2, 3]
[1, 3, 2]
[2, 1, 3]
[2, 3, 1]
[3, 1, 2]
[3, 2, 1]
6通り      //number of cases
```
<br/>
<br/>

### Combination.php
- if you standard input array and selection number, this code standard output return it's combination array and the number of cases.
- this Supports duplicates and strings.
- 配列とその中から選ぶ個数を標準入力すると、その組み合わせと場合の数を全て標準出力します。
- 重複や文字列にも対応しています（ただし、要素の型は統一されていて欲しい）。

#### Input
Input is given from Standard Input in the following format:
```
1 2 3 4 //array(each value is separated by whitespace)
2       //select 2 values from array
```

#### Output
```
[1, 2, 3]
[1, 2, 4]
[1, 3, 4]
[2, 3, 4]
4通り      //number of cases
```
