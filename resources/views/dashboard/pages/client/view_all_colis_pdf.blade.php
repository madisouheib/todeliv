<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
 <title> ToDeliver Manifest </title>
</head>
<body>

  <style>





body {




}

#tabledata {

width: 100%;

   margin: 0;
  left: 0px;
  right: 0px;
  top:0%;
  border-collapse: collapse;
margin-top:-43px;
margin-right:-43px;
margin-left:-43px;
text-align: center;

}

hr {

border: 1px dashed red;

}
#tableadditional {

  border-collapse: collapse;
text-align: center;
  
  border: 1px solid #ddd;

 

}
hr {
  border: 1px dotted black;
  margin-right: -30px;
  margin-left:0px;


}

  </style>



   @foreach($data ?? '' as $dat)
   
   <div>

  
  <table  id="tabledata"     border="1">

 
<tr>
  <td rowspan="5" style=" padding:0px; border: dotted 2px {{ $brand->colors }};  ">
    <table  style="margin:0px;"  >

<tr> <td style="padding-top:0px;">

  <img style="margin-top:-40px;margin-bottom:30px;display:block;" heigth="40" width="40" src="{{ public_path().$brand->logo }}">

 
</td></tr>
<tr> <td> <h6 style="  transform: rotate(-90deg);"> {{ $brand->brand }} </h6>  </td></tr>
    </table>





 </td>
  <td rowspan="2" style="width:24%;"> 
 
  
    <h5 style="  font-family:">{{ $dat->nom_client  }}  </h5>
    <h5> Commune : {{ $dat->commune  }} </h5>
   
    <p style="font-size: 12px; word-break: break-all;"> Adresse : {{ $dat->adress  }}</p>
  
  </td>
  <td>
  @foreach ($wilayas as $item)
       @if(Str::upper($item->nom_wilaya) == $dat->wilaya or $dat->wilaya ==  $item->nom_wilaya_ar )
       <h3> 
  
     {{ $item->mat_wilaya  }}

       </h3>  
       @else 
   

   @endforeach 
   <h5>  
   {{ $dat->wilaya  }}
  </h5>

  
  </td>
  <td> 
    
    <img src="data:image/svg;base64, {{ base64_encode(QrCode::format('svg')->size(100)->generate($dat->id_colis)) }} "> </td>
  <td  colspan="3" style="padding:0px;">

   <h6 style="font-size: 12px;"> Remarque : </h6>
  <div style="font-size: 10px; margin:0px;padding:0px;margin-top:-7px;" > colis créé le :  <br> {{ $dat->created_at   }} </div> <br>
  <p style="font-size: 10px;" > {{ $dat->remarque  }}    </p>
      
  </td>
</tr>

<tr>
 
<td colspan="2" style="height: 50px;">
  <strong style="font-size:12px;"> Expéditeur : </strong> 
  {{Str::upper($dat->name)  }} <br>
  {{Str::upper($dat->phone)  }} <br>
    {{ $dat->adresse  }} 
  
  
  
   </td>
   <td colspan="3">   <h6 style="font-size: 12px;"> Reservez au livreur : </h6>
    <h3 style="margin-top:16px;">  @if($dat->stopdesk == true)
      <b> STOP DESK </b> 
    @else 
   <b> à domicile  </b> 
    @endif
    </h3>  

  </td>

</tr>

<tr>

<td style="height: 40px;"> <h6 style="font-size:12px;  font-family: DejaVu Sans, sans-serif;  "> {{  'N-TEL : '.$dat->tel }} </h6> </td>
<td colspan="2" style="border: 2px dotted {{ $brand->colors }}" >
  Recouverement : {{ $dat->price }} DA
</td>
<td colspan="3" > <p style="font-size:8px;color:grey; "> cochez si oui  </p></td>
</tr>

<tr >
<td style="padding-bottom:3px; vertical-align: middle;"  >  <p style="margin:0px; vertical-align: middle;"> {{ $dat->id_colis.' >'  }}  </p> 
  <img  style="height: 25px;width:120px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG('17', 'C39')}}" alt="barcode" />

</td>

<td colspan="2" style="">Quantité : {{ $dat->qte }}  </td>
<td colspan="3"> <h6 style="font-size:10px;"> Tentatives</h6></td>

</tr>

<tr>
  <td colspan="3" style="height: 50px;"> <h5> Produit :   {{ $dat->produit }}</h5> </td>
  <td style="  border: 1px dotted   #000 " >1</td>
<td   style="  border: 1px dotted   #000 "  >2</td>
<td   style="  border: 1px dotted   #000 "   >3</td>
 
</tr>
    </table>
    <hr style=" height:2px; color:{{ $brand->colors}}"  >
</div>


<div  style=""   >
  <table style="width:100%;">
  <tr>
  <td style="width: 30%;background-color:{{ $brand->colors }};height:30px;" ></td>
  <td style="width: 30%;text-align:center;"><h4> Facture n• {{ $brand->brand }}-{{ $dat->id_colis  }}  </h4>  </td>
  <td style="width: 30%;background-color:{{ $brand->colors }};height:30px;" ></td>

    </tr>
  </table>
  <table style="width:100%;height: 20%;">
    <tr>
    <td style="width:50%;"> 
    <h4 style="font-family: cairo, sans-serif;">  Vendeur </h4> <br>
    <p>  {{Str::upper($dat->name)  }} <br>
    
      {{Str::upper($dat->phone)  }} <br>
      {{Str::upper($dat->adresse)  }} <br>
    </p>
    
    </td>
    <td style="width:50%;">
    <h4 style="font-family: cairo, sans-serif;">  Achteur </h4> <br> 
    <p> 
      {{Str::upper($dat->nom_client)  }} <br>
      {{Str::upper($dat->tel)  }} <br>
      {{Str::upper($dat->adress)  }} <br>
  
  
    </p>
  </td>
      </tr>
  </table>
  <table style="width:100%;height: 10%;" >   
      <tr>
  <td style="width:20%;" > </td>
        <td style="width:30%;padding-top:20%;">
          <h3 style="margin-right:0px;float: right;" >  Prix :    </h3>
  
        </td>
        <td style="width:40%;padding-top:20%;">
          <h3  style="font-family:cairo;font-size:18px;" > <?php echo $dat['price'];  ?> DA </h3>
        </td>
  
  
  
      </tr>
    </table>
  
    <table style="width:100%;height: 10%;margin-top:10px;"  border="1">
  <tr style="">
  <td style="height: 30px;width:70%">Désignation</td>
  <td style="width:30%">Prix </td>
  
  
  </tr>
  <tr style="">
    <td style="width:70%;padding-bottom:200px;"> <h3 style="margin-bottom:300px;"> {{ $dat->produit }}   </h3>  </td>
    <td style="width:30%;padding-bottom:200px;"> <h3 style="font-family:cairo;"> <?php echo $dat['price'];  ?>  DA  </h3> </td>
    
    
    </tr>
  
    </table>
    <table style="width:100%;">
    <tr >
      <td style="width:30%;"></td>
      <td style="width:40%;"> <h3 style="margin-top:10px;"> Total :  </h3>  </td>
      <td style="width:30%;background-color:#0079c1;"> <h3 style="font-family:cairo;color:#fff;"> <?php echo $dat['price'];  ?> DA   </h3> </td>
      
      
      </tr>
    </table>
    <br>
    <h4 style="margin-left:500px;margin-top:10;"> Signature Vendeur </h4>
  </div>
  
@endforeach



</body>
</html>