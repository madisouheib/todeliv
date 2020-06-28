<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <title></title>
</head>
<body>

  <style>
body {
font-family: DejaVu Sans;
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

  padding-top: -8px;
  padding-bottom: -10px;

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
body {

  padding: 0; 
 
}
  </style>
  <table  id="tabledata"    border="1">
<tr>
  <td rowspan="5" style="width:6% ;   
">

<h6 style=" margin-top:0%;  transform: rotate(-90deg);"> SEND  EXPRES </h6>  </td>
  <td rowspan="2"> 
    <img style="margin-top:-2%;margin-bottom:-4%;" heigth="40" width="40" src="{{ public_path().'/images/a.png' }}">
    {{ $nom_client  }}
  
  </td>
  <td>
   <h3> 16 </h3>  

    {{Str::upper($wilaya)  }}
  
  </td>
  <td> tracking id : 
    send-{{ $id_colis }} <br>
    
    <img  style="height: 50px;width:140px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" /> </td>
  <td  colspan="3" style="padding:0px;">

   <h6 style="font-size: 12px;"> Remarque : </h6>
  <div style="font-size: 10px; margin:0px;padding:0px;margin-top:-7px;" > colis créé le :  <br> {{ $created_at   }} </div> <br>
  <p style="font-size: 10px;" >   </p>
      
  </td>
</tr>

<tr>
 
<td colspan="2" style="height: 50px;">
  <strong> Expéditeur : </strong> 
  {{Str::upper($name)  }} <br>
  {{Str::upper($phone)  }} <br>
  {{ $adresse  }} 
  
  
  
   </td>
   <td colspan="3">   <h6 style="font-size: 12px;"> Reservez au livreur : </h6>
  <p style="font-size:12px;"> en  attente </p>  
  </td>

</tr>

<tr>

<td> <h6 style="font-size:12px; "> {{  'N-TEL : '.$phone }} </h6> </td>
<td colspan="2" >
  Recouverement : {{ $price }} DA
</td>
<td colspan="3" > <p style="font-size:8px;color:grey; "> cochez si oui  </p></td>
</tr>

<tr >
<td style="padding-bottom:3px;"  >  <p style="margin:0px;"> {{ '#'.$id_colis  }}  </p> 
  <img  style="height: 25px;width:120px;" src="data:image/png;base64,{{DNS1D::getBarcodePNG('17', 'C39')}}" alt="barcode" />

</td>

<td colspan="2" style=""> </td>
<td colspan="3"> <h6 style="font-size:10px;"> Tentative</h6></td>

</tr>

<tr>
  <td colspan="3" style="height: 50px;"> <h5> Produit :   {{ $produit }}</h5> </td>
  <td >1</td>
<td >2</td>
<td >3</td>
 
</tr>
    </table>

<hr >
</body>
</html>