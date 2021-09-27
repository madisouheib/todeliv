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

private $rows = false;
private $coms = '';

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

        $idhub = Auth::user()->hub_id;







    

 
        return new Colis([
    
            'nom_client' => $row['Nom'],
            'tel'        => $row['Num'],
            'adress'     => $row['Adresse'],
            'commune'    => $row['Commun'],
            'wilaya'     => $row['Wilaya'], 
            'produit'    => $row['Produit'],
            'qte'        => $row['Qu'],
            'id_hub'     => $idhub,
            'price'      => $row['Prix'],
            'remarque'   => $row['Remarque'],
            'id_com'     => $this->data['idcom'],
            'id_partenaire'=> $this->data['user']
    
            //
        ]);
    
     
  

}





      

   

        
    
    
    public function getRowCount(): int
    {
        return $this->rows;
    }


    public function getComs(): int
    {
        return $this->coms;
    }
    
}
