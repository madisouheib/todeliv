<?php

namespace App\Exports;

use App\FicheColis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class DeliveryExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
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
        return     FicheColis::select('colis.nom_client as Nom','colis.produit as produit','colis.adress as Adresse','colis.wilaya as Wialaya','colis.tel as Tel','colis.commune as Commune','colis.qte as Qu','colis.updated_at as date','colis.remarque as remarque','users.name as partenaire','colis.price as Prix')
        ->leftJoin('colis','colis.id_colis','=','fiche_fields.id_colis')
        ->leftJoin('fiche','fiche.id_fiche','=','fiche_fields.id_fiche')
        ->leftJoin('commandes','commandes.id_coms','=','colis.id_com')
        ->leftJoin('users','users.id','=','commandes.id_clt')
        ->where('fiche_fields.id_fiche','=',$this->id)
        ->get();
    }

    public function headings():array
    {
        return ["Nom Client", "Produit", "Adresse","Wilaya","Tel","Commune","Quantité","Date","Remarque","Partenaire","Prix"];
    }

    public function registerEvents():array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
