<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    private static $students= [
        [
            "id" => "1",
            "nis" => "3103119101",
            "nama" => "Fatih Abdurrahman",
            "tanggal_lahir" => "2003-11-08",
            "kelas" => "11 PPLG 2",
            "alamat" => "Kota Bengkulu",
            ],
            [
            "id" => "2",
            "nis" => "3104119102",
            "nama" => "Rizky Raditya",
            "tanggal_lahir" => "2003-11-08",
            "kelas" => "11 PPLG 2",
            "alamat" => "Kota Solo",
            ],
            [
            "id" => "3",
            "nis" => "3105119103",
            "nama" => "Ahmad Pradhipta",
            "tanggal_lahir" => "2003-11-08",
            "kelas" => "11 PPLG 2",
            "alamat" => "Lamongan",
            ],
            [
            "id" => "4",
            "nis" => "3106119104",
            "nama" => "Davin Kavila Haidar",
            "tanggal_lahir" => "2003-11-08",
            "kelas" => "11 PPLG 2",
            "alamat" => "Mijen, Semarang",
            ],
            [
            "id" => "5",
            "nis" => "3107119105",
            "nama" => "Radya Harbani",
            "tanggal_lahir" => "2003-11-08",
            "kelas" => "11 PPLG 2",
            "alamat" => "Kota Batam",
            ]
   ];

   public static function all()
   {
       return self::$students;
   }
}
