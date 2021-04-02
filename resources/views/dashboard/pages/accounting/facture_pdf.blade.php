<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
 <title></title>
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

#tableadditional {

  border-collapse: collapse;
text-align: center;
  
  border: 1px solid #ddd;

 

}
hr {
  border: 2px dotted black;
  margin-right: -30px;
  margin-left:0px;


}

  </style>

<div    >
<table style="width:100%;">
<tr>
<td style="width: 30%;background-color:#0079c1;height:35px;" ></td>
<td style="width: 30%;text-align:center;"><h2> Facture n• send-{{ $user->id_accounting  }}  </h2>  </td>
<td style="width: 30%;background-color:#0079c1;height:35px;" ></td>


  </tr>
</table>
<table style="width:100%;height: 20%;">
  <tr>
  <td style="width:50%;"> 
  <h5 style="font-family: cairo, sans-serif;">  Company </h5>
  <p>  To Deliver  <br>
  
 0559 95959 95 <br>
   ORAN BIR EL JIR  <br>
  </p>
  
  </td>
  <td style="width:50%;">
  <h5 style="font-family: cairo, sans-serif;">  Client </h5>
  <p> 
    {{Str::upper($user->name)  }} <br>
    {{Str::upper($user->phone)  }} <br>
    {{Str::upper($user->adresse)  }} <br>


  </p>
</td>
    </tr>
</table>

  <table style="width:100%;height: 40%;margin-top:20px;  border-collapse: collapse;margin-top:10%"  border="1">
<tr style="">
    <td style="height: 30px;width:10%;text-align:center;">#id</td>
<td style="height: 30px;width:30%;text-align:center;">Désignation</td>
<td style="height: 30px;width:15%;text-align:center;">prix</td>
<td style="height: 30px;width:15%;text-align:center;">Status</td>
<td style="height: 30px;width:15%;text-align:center;">Livraison</td>
<td style="width:15%;text-align:center;">Total </td>


</tr>

@foreach ($data as $colis)
    
<tr style="">
    <td style="width:10%;padding-bottom:5px;text-align:center;"> <h6 style="margin-bottom:5px;"> {{ $colis->id_colis }}   </h6>  </td>
  <td style="width:30%;padding-bottom:5px;"> <h6 style="margin-bottom:5px;"> {{ $colis->produit }}   </h6>  </td>
  <td style="width:15%;padding-bottom:5px;text-align:center;"> <h6 style="font-family:cairo;"> {{ $colis->price }}   DA  </h6> </td>
  <td style="width:15%;padding-bottom:5px;text-align:center;"> 
    @if($colis->id_stats == 12 )
    <h6 style="margin-bottom:5px;color:#00c16e;"> 
 Livré
    </h6>
@else
<h6 style="margin-bottom:5px;color:#ed1b2e;"> 
Retour
</h6>
    @endif
    
  </td>
  <td style="width:15%;padding-bottom:5px;text-align:center;"> 
    @if($colis->id_stats == 12 )
    <h6 style="margin-bottom:5px;color:#00c16e;"> {{ $colis->shipping_price }} DA  </h6>  
    @else
    <h6 style="margin-bottom:5px;color:#ed1b2e;"> {{ $colis->shipping_price }} DA  </h6>  

    @endif
</td>
  <td style="width:15%;padding-bottom:5px;text-align:center">
    
    @if($colis->id_stats == 12)
    <h6 style="margin-bottom:5px;color:#00c16e;"> + {{ $colis->price }} DA    </h6> 
    @else 
    <h6 style="margin-bottom:5px;">   </h6> 
    @endif
 </td>
</tr>

  @endforeach

  </table>
  <table style="width:100%;">
  <tr >
    <td style="width:30%;"></td>
    <td style="width:50%;"> <h5 style="margin-top:10px;"> Total retour :  </h5>  </td>
    <td style="width:15%;background-color:#e6e7e7;text-align:center;"> <h5 style="font-family:cairo;color:#ed1b2e;">  {{ $user->nodeliv }} DA   </h5> </td>
    
    
    </tr>
    <tr >
        <td style="width:30%;"></td>
        <td style="width:50%;"> <h5 style="margin-top:10px;"> Total livre :  </h5>  </td>
        <td style="width:15%;background-color:#e6e7e7;text-align:center;"> <h5 style="font-family:cairo;color:#00c16e;">{{ $user->delivred }}  DA   </h5> </td>
        
        
        </tr>
        <tr >
            <td style="width:30%;"></td>
            <td style="width:50%;"> <h5 style="margin-top:10px;"> Total encaissé :  </h5>  </td>
            <td style="width:15%;background-color:#e6e7e7;text-align:center;"> <h5 style="font-family:cairo;"> {{ $user->encaiss }}   DA   </h5> </td>
            
            
            </tr>
            <tr >
                <td style="width:30%;"></td>
                <td style="width:50%;"> <h5 style="margin-top:10px;"> Total verser :  </h5>  </td>
                <td style="width:15%;background-color:#e6e7e7;text-align:center;"> <h5 style="font-family:cairo;#00c16e;">  {{ $user->prices -  $user->encaiss     }} .00   DA   </h5> </td>
                
                
                </tr>
  </table>
  <br>
  
  <h5 style="margin-left:500px;margin-top:10;"> Signature Client </h5>
</div>




</body>
</html>