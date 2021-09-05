# php_files
this repository is my PHP Library. use PHP 7.4.9
<br>
<br>

## file description
### Permutation.php
- if you do standard input array, this code do standard output return it's permutation array and the number of cases.
- this Supports duplicates and strings.
- 標準入力で配列を与えると、その順列と場合の数を全て標準出力します。配列の各要素は、半角スペースで区切ります。
- 重複や文字列にも対応しています（ただし、要素の型は統一されていて欲しい）。
<br>

#### Ex.1
##### Input
入力は以下の形式で与えられます（文字ごとに半角スペースがあります）。
<br>
Input is given from Standard Input in the following format:
```
1 2 3 //array(each value is separated by whitespace)
```

##### Output
```
[1, 2, 3]
[1, 3, 2]
[2, 1, 3]
[2, 3, 1]
[3, 1, 2]
[3, 2, 1]
6通り      //number of cases
```
<br>

#### Ex.2
##### Input
```
1 1 2 3
```

##### Output
```
[1, 1, 2, 3]
[1, 1, 3, 2]
[1, 2, 1, 3]
[1, 2, 3, 1]
[1, 3, 1, 2]
[1, 3, 2, 1]
[2, 1, 1, 3]
[2, 1, 3, 1]
[2, 3, 1, 1]
[3, 1, 1, 2]
[3, 1, 2, 1]
[3, 2, 1, 1]
12通り  
```
<br>
<br>

#### Ex.3
##### Input
```
a b c
```

##### Output
```
[a, b, c]
[a, c, b]
[b, a, c]
[b, c, a]
[c, a, b]
[c, b, a]
6通り 
```
<br>

#### Ex.4
##### Input
```
a a b c
```

##### Output
```
[a, a, b, c]
[a, a, c, b]
[a, b, a, c]
[a, b, c, a]
[a, c, a, b]
[a, c, b, a]
[b, a, a, c]
[b, a, c, a]
[b, c, a, a]
[c, a, a, b]
[c, a, b, a]
[c, b, a, a]
12通り
```
<br>

#### Ex.5
##### Input
```
a 1 b 
```

##### Output
```
[1, a, b]
[1, b, a]
[a, 1, b]
[a, b, 1]
[b, 1, a]
[b, a, 1]
6通り 
```
<br>


### Combination.php
- if you do standard input array and selection number, this code do standard output return it's combination array and the number of cases.
- this Supports duplicates and strings.
- 配列とその中から選ぶ個数を標準入力すると、その組み合わせと場合の数を全て標準出力します。配列の各要素は、半角スペースで区切ります。
- 重複や文字列にも対応しています（ただし、要素の型は統一されていて欲しい）。
<br>

#### Ex.1
##### Input
```
1 2 3 4   //array(each value is separated by whitespace)
3         //select 3 values from array
```

##### Output
```
[1, 2, 3]
[1, 2, 4]
[1, 3, 4]
[2, 3, 4]
4通り      //number of cases
```
<br>

#### Ex.2
##### Input
```
1 1 2 2 3 
3         
```

##### Output
```
[1, 1, 2]
[1, 1, 3]
[1, 2, 2]
[1, 2, 3]
[2, 2, 3]
5通り      
```
<br>

#### Ex.3
##### Input
```
a a b b c 
3         
```

##### Output
```
[a, a, b]
[a, a, c]
[a, b, b]
[a, b, c]
[b, b, c]
5通り     
```
<br>

#### Ex.4
##### Input
```
1 1 a a b 
2         
```

##### Output
```
[1, 1]
[1, a]
[1, b]
[a, a]
[a, b]
5通り     
```

<br>
