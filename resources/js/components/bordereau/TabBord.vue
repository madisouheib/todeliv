<template>
<div>

<div class="row"> 
<div class="card-body col-4">  
<div class="form-group">

    <label for="logo">logo :</label>
    <input class="form-control" name="logo" type="file"  accept="image/*" >
</div>
<div class="form-group">

    <label for="logo">brand :</label>
    <input class="form-control" name="brand" type="text" >
</div>
<div class="form-group">

    <label for="logo">phone :</label>
    <input class="form-control" name="phone" type="text" >
</div>
<div class="form-group">

    <label for="logo">notes :</label>
    <input class="form-control" name="logo" type="text" >
</div>
<div class="form-group">

    <label for="logo">color :</label>
    <input class="form-control" name="logo" type="color" >
</div>

</div>
<div class="col-8">

  <table  id="tabledata"    border="1">
<tr>
  <td rowspan="5" style="width:6% ;   
">

<h6 style=" margin-top:0%;  transform: rotate(-90deg);"> ToDeliver </h6>  </td>
  <td rowspan="2"> 
    <img style="" heigth="40" width="40" :src="'/images/a.png'">
    
  
    <h5 style="  font-family:">  Jhone Pero  </h5>
    <h5> commune :   </h5>
   
    <p style="font-size: 12px;"> Adresse : 3 rue soudani </p>
  
  </td>
  <td>
   <h3> 

    Alger </h3>   
  
  </td>
  <td> tracking id : 
    Deliv-3333 <br>
    
    <img  style="height: 50px;width:140px;" src="" alt="barcode" /> </td>
  <td  colspan="3" style="padding:0px;">

   <h6 style="font-size: 12px;"> Remarque : </h6>
  <div style="font-size: 10px; margin:0px;padding:0px;margin-top:-7px;" > colis créé le :  <br> {{ $created_at   }} </div> <br>
  <p style="font-size: 10px;" > {{ $remarque  }}    </p>
      
  </td>
</tr>

<tr>
 
<td colspan="2" style="height: 50px;">
  <strong> Expéditeur : </strong> 
 Name  <br>
Phone  <br>
Adresse 
  
  
  
   </td>
   <td colspan="3">   <h6 style="font-size: 12px;"> Reservez au livreur : </h6>
  <p style="font-size:12px;"> en  attente </p>  
  </td>

</tr>

<tr>

<td style="height: 40px;"> <h6 style="font-size:12px;  font-family: DejaVu Sans, sans-serif;  "> N-Tel : 0333 33 33  </h6> </td>
<td colspan="2" >
  
  <h3 style="font-family: cairo, sans-serif; font-size:16px;background-color:black; color:#fff;margin-t:15px;"> 
  Recouverement : 3333  DA </h3>
</td>
<td colspan="3" > <p style="font-size:8px;color:grey; "> cochez si oui  </p></td>
</tr>

<tr >
<td style="padding-bottom:3px;"  >  <p style="margin:0px;">  </p> 
  <img  style="height: 25px;width:120px;" src="" alt="barcode" />

</td>

<td colspan="2" style="">Quantité : 1   </td>
<td colspan="3"> <h6 style="font-size:10px;"> Tentative</h6></td>

</tr>

<tr>
  <td colspan="3" style="height: 50px;"> <h5> Produit :    Montre swatch </h5> </td>
  <td >1</td>
<td >2</td>
<td >3</td>
 
</tr>
    </table>


</div>
                        
                                     </div>

                 </div>                  
</template>


<script>


  export default {
 components: {
    
  
  },
 

     data(){
 return {
  

   
    };
     },
 created ()
 {






 },
 methods:{
  
 
   
       



 },
 


     }

      


</script>