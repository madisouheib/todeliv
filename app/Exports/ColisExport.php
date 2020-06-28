<?php

namespace App\Exports;

use App\Colis;
use Maatwebsite\Excel\Concerns\FromCollection;

class ColisExport implements FromCollection
{


    private $id ; 



    function __construct($id)
    {
        $this->id = $id ;
    
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $idcom = $this->id ; 
        return Colis::where('id_com','=', $idcom)->get();
    }
}
