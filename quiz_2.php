<?php


function GenerateSiswa($count){

    $randnama = "String Nama".rand(1000,9999);
    $randnrp = rand(1000,9999);
    $mapel = [
        'Inggris',
        'Indonesia',
        'Jepang'
    ];

    $listdata = [];

    $listdata[] = [
        'nrp' => $randnrp,
        'nama' => $randnama,
        'daftarNilai' => [
            'mapel' => $mapel[rand(0,2)],
            'nilai' => rand(000,100)
        ]
    ];

    for ($i=0; $i < $count ; $i++) { 
        # code...

        $listdata[] = [
            'nrp' => $randnrp,
            'nama' => $randnama,
            'daftarNilai' => [
                'mapel' => $mapel[rand(0,2)],
                'nilai' => rand(000,100)
            ]
        ];
    }

    return [
        'status' => true,
        'message' => "Success",
        'data' => $listdata
    ];
}

var_dump(GenerateSiswa(19));