<?php

namespace App\Exports;

use App\Colis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class RetourExport implements FromCollection,WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Colis::select('colis.nom_client as Nom','colis.produit as produit','colis.adress as Adresse','colis.wilaya as Wialaya','colis.tel as Tel','colis.commune as Commune','colis.qte as Qu','colis.updated_at as date','colis.remarque as remarque','users.name as partenaire','colis.price as Prix')
        ->leftJoin('commandes', 'colis.id_com', '=', 'commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->where('validation','=',true)
        ->where('colis.id_stats','=',3)
        ->orderBy('colis.id_colis', 'desc')
        ->get();
    }

    public function headings():array
    {
        return ["Nom Client", "Produit", "Adresse","Wilaya","Tel","Commune","Quantité","Date","Remarque","Partenaire","Prix"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
