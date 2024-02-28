<?php

$color = [
    'Merah', 
    'Kuning',
    'Hijau'
];

function callcolor($color, $count_pemanggilan){

    $countcolor = count($color);
    // var_dump($countcolor);

    $fixedcount = $count_pemanggilan%count($color);

    if($fixedcount == 0){
        return $color[2];
    }else if($fixedcount == 1){
        return $color[0];
    }else{
        return $color[1];
    }
    // var_dump($fi)
    // echo $fixedcount;
}


// Asumsi Count pemanggilan merupakan jumlah fungsi dipanggil keberapa kalinya. dibawah ini merupakan contoh pemanggilan fungsi ke 4 kalinya
var_dump(callcolor($color, 4));