<?php

$string = "strawberry";

$split = str_split($string);

// var_dump(json_encode($split));
$listalphabet = [
    // 'r' => 1
];

// var_dump($listalphabet[6]);

for ($i = 0; $i < count($split); $i++){

    if(array_key_exists($split[$i], $listalphabet)){

        $listalphabet[$split[$i]] = $listalphabet[$split[$i]]+1;
    }else{
        $listalphabet[$split[$i]] = 1;
    }
}

$getMax = [];

// var_dump($listalphabet);

for($j=0; $j < count($listalphabet); $j++){

    // var_dump($listalphabet[$j]);
    // if($getMax == NULL){
        
    //     if($getMax[0] < $listalphabet[$j]){
    //         var_dump("lebih");
    //     }else{
    //         var_dump("kurang");
    //     }
    // }
}

// print("<pre>".print_r($listalphabet,true)."</pre>");
$data = [
    'alphabet' => array_keys($listalphabet, max($listalphabet)),
    'count_alphabet' => max($listalphabet),
];

var_dump($data);

// var_dump(max($listalphabet));
// var_dump(array_keys($listalphabet, max($listalphabet)));

// for($i=0; $i < strlen($string); $i++){

//     var_dump($i);
//     // var_dump($split[$i]);
//     // $check = array_search($split[$i], $listalphabet);

//     // var_dump($check);
//     // if($check){
//     //     // $listalphabet
//     // }else{
//     //     $listalphabet[][$split[$i]] = 1;
//     // }
// }

// var_dump($listalphabet);