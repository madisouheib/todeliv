<?php

namespace App\Exports;

use App\Colis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class FailedColisExport implements FromCollection,WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return   Colis::select('colis.nom_client as Nom','colis.produit as produit','colis.adress as Adresse','colis.wilaya as Wialaya','colis.tel as Tel','colis.commune as Commune','colis.qte as Qu','colis.updated_at as date','colis.remarque as remarque','users.name as partenaire','colis.price as Prix')
        ->leftJoin('stats_colis', function($query) {
            $query->on('colis.id_colis','=','stats_colis.id_colis')
                ->whereRaw('stats_colis.id_colis IN (select MAX(a2.id_stats_colis) from stats_colis as a2 join colis as u2 on u2.id_colis = a2.id_colis group by a2.id_colis)');
    })->leftJoin('commandes', 'colis.id_com','=','commandes.id_coms')
        ->leftJoin('users', 'users.id', '=', 'commandes.id_clt')
        ->leftJoin('hubs', 'hubs.id_hub', '=', 'users.hub_id')
        ->join('stats', 'stats.id_stats', '=', 'colis.id_stats')
        ->where('validation','=',true)
        ->where('stats.order_stats','=',5)
        ->distinct('colis.id_colis')
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
