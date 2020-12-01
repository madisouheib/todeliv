<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
<title> #IdFiche- {{ $data->id_fiche }} {{ $data->created_at   }}</title>
 <style>   



b {



}
#topdata {
    border:dotted 1px black ;
    border-collapse: collapse;
width: 70%;
}
table tr td {
    border: solid 1px black ;
    font-size:12px;



}
body #datacolumn {
    border:solid 1px black ;
    border-collapse: collapse;
width: 100%;
margin-top:2px;
border-radius: 4px; 

}
#tableclt {
    border-collapse: collapse;
    border: none;!important


}
#righttable {

    width: 40%;


}

 
</style> 
</head>
<body>

<table  id="topdata" >

<tr>

<td style="width:60%;">Courrier :  {{  $data->livreur  }}  </td>
<td style="width:20%;"> Total colis : {{  $data->fichecolis_count  }}</td>
<td  rowspan="2"> <img  style="width:180px;height:24px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->id_fiche , 'C39')}}" alt="barcode" />  </td>

</tr>
<tr>  

<td colspan="2">Montant total : {{ $data->prices }} DA </td>
</tr>
<tr>  

<td colspan="2">Date : {{$data->created_at }}  par : Cord  {{ $data->cordinateur }}</td>
    <td  style="text-align: center"  > <h4> F-Route  :  {{$data->id_fiche }} </h4>   </td>
    </tr>

</table>





 @foreach($colis as $col)
 <table  id="datacolumn" style="border-bottom: dotted  1px  black;" >

    <tr>
    
  <td style="width: 7%"> #{{ $col->id_colis}} <br> SEND </td>
  <td style="width: 31%;padding:2px;"  > <img  style="width:200px;height:30px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($col->id_colis, 'C39')}}" alt="barcode" />  </td>
  <td style="width: 14%"  style="background-color:black;color:white;">COD</td>
  <td colspan="2" style="width: 16%"> Date : {{ $col->created  }}  <span style="background-color:black;color:white;padding:2px;margin:1px;padding-top:-3px;float:right"> T: {{ $col->stats_count }} </span> </td>
  
  <td  style="width: 20%;padding:0px;height:20px;text-align:center;" > <p  > Signature  </p>    </td>
  <td  style="width: 20%;padding:0px;text-align:center;" > <p> Remarque  </p>  </td>
        
        </tr>
        <tr>
            <td colspan="3" rowspan="2"   >
                <table id="tableclt" cellspacing="0" cellpadding="0" style="border:none;">  
          <tbody>
            <tr style=" "> 
                
                <td style="border: none;font-size:12px;">  <p> ( <b> Prt : </b>  {{ $col->partenaire }}  <b> Tel:  </b>  {{ $col->partenaire_adresse }} )  </p>  
                </td>
             
            </tr>
            <tr>    <td style="border: none;font-size:11px;"><p> <b> Client : </b>   {{$col->nom_client }} / <b> Tel :  </b> {{ $col->tel }}  </p>
                <p>    <b> Adrs  : </b> {{ $col->adress }} </p>
    
     
            </td> </tr>
            <tr>
<td colspan="2" style="border: none;font-size:11px;" >            <p> <b> Produit   :  </b>  {{ $col->produit }} </p></td>
               
               
            
            </tr>
          </tbody>
        </table>
            </td>
<td colspan="2">  {{ $col->wilaya  }}  </td>

<td rowspan="3" style="width: 20%" >    </td>
<td rowspan="3" style="width: 20%" > </td>


        </tr>
    <tr>  <td style="text-align: center;" colspan="2"> <h3 style="background-color: black;color:white"> {{ $col->price }} DA </h3></td></tr>


</table>
@endforeach
    
 

</body>
</html>