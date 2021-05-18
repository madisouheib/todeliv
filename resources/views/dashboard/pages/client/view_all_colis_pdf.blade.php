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
table tr td {


  

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
   
   <div   >
  <table  id="tabledata"     border="1">

 
<tr>
  <td rowspan="5" style="width:6% ;   
">

<h6 style=" margin-top:0%;  transform: rotate(-90deg);"> ToDeliver </h6>  </td>
  <td rowspan="2"> 

  
    <h5 style="  font-family:">{{ $dat->nom_client  }}  </h5>
    <h5> commune : {{ $dat->commune  }} </h5>
   
    <p style="font-size: 12px;"> Adresse : {{ $dat->adress  }}</p>
  
  </td>
  <td>
   <h3> 16 </h3>  

    {{Str::upper($dat->wilaya)  }}
  
  </td>
  <td> tracking id : 
    Deliver-{{ $dat->id_colis }} <br>
    
    <img  style="height: 50px;width:140px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($dat->id_colis, 'C39')}}" alt="barcode" /> </td>
  <td  colspan="3" style="padding:0px;">

   <h6 style="font-size: 12px;"> Remarque : </h6>
  <div style="font-size: 10px; margin:0px;padding:0px;margin-top:-7px;" > colis créé le :  <br> {{ $dat->created_at   }} </div> <br>
  <p style="font-size: 10px;" > {{ $dat->remarque  }}    </p>
      
  </td>
</tr>

<tr>
 
<td colspan="2" style="height: 50px;">
  <strong> Expéditeur : </strong> 
  {{Str::upper($dat->name)  }} <br>
  {{Str::upper($dat->phone)  }} <br>
    {{ $dat->adresse  }} 
  
  
  
   </td>
   <td colspan="3">   <h6 style="font-size: 12px;"> Reservez au livreur : </h6>
  <p style="font-size:12px;"> en  attente </p>  
  </td>

</tr>

<tr>

<td style="height: 40px;"> <h6 style="font-size:12px;  font-family: DejaVu Sans, sans-serif;  "> {{  'N-TEL : '.$dat->tel }} </h6> </td>
<td colspan="2" >
  Recouverement : {{ $dat->price }} DA
</td>
<td colspan="3" > <p style="font-size:8px;color:grey; "> cochez si oui  </p></td>
</tr>

<tr >
<td style="padding-bottom:3px;"  >  <p style="margin:0px;"> {{ '#'.$dat->id_colis  }}  </p> 
  <img  style="height: 25px;width:120px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG('17', 'C39')}}" alt="barcode" />

</td>

<td colspan="2" style="">Quantité : {{ $dat->qte }}  </td>
<td colspan="3"> <h6 style="font-size:10px;"> Tentatives</h6></td>

</tr>

<tr>
  <td colspan="3" style="height: 50px;"> <h5> Produit :   {{ $dat->produit }}</h5> </td>
  <td >1</td>
<td >2</td>
<td >3</td>
 
</tr>
    </table>
    <hr style=" " >
</div>


<div  style=""   >
  <table style="width:100%;">
  <tr>
  <td style="width: 30%;background-color:#0079c1;height:35px;" ></td>
  <td style="width: 30%;text-align:center;"><h2> Facture n• ToDeliv-{{ $dat->id_colis  }}  </h2>  </td>
  <td style="width: 30%;background-color:#0079c1;height:35px;" ></td>
  
  
    </tr>
  </table>
  <table style="width:100%;height: 20%;">
    <tr>
    <td style="width:50%;"> 
    <h4 style="font-family: cairo, sans-serif;">  Vendeur </h4>
    <p>  {{Str::upper($dat->name)  }} <br>
    
      {{Str::upper($dat->phone)  }} <br>
      {{Str::upper($dat->adresse)  }} <br>
    </p>
    
    </td>
    <td style="width:50%;">
    <h4 style="font-family: cairo, sans-serif;">  Achteur </h4>
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