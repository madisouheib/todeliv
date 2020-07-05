<?php

namespace App\Imports;
use Illuminate\Support\Facades\Auth;
use App\Colis;
use App\Commandes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');


class ColisImport implements ToModel, WithHeadingRow
{

private $data ; 



    function __construct($data)
    {
        $this->data = $data ;
    
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

$idcom = $this->data ; 
     


     

        return new Colis([



            'nom_client'     => $row['Nom'],
            'tel'     => trim($row['Num']),
            'adress'     => $row['Adresse'],
            'commune'     => $row['Commun'],
            'wilaya'    => $row['Wilaya'], 
            'produit'     => $row['Produit'],
            'qte'     => $row['Qu'],
            'price'     => trim($row['Prix']),
            'remarque'     => $row['Remarque'],
            'id_com'     => $idcom

            //
        ]);

   

        
    
    }
}
