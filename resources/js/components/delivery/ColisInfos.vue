<template>
    
        
  
                <div id="ModalColisInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalCenterTitle">information sur le colis <i class="fas fa-box-open"></i> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               <table class="table table-striped">
                   <tbody>  
<tr>
<td> <i class="fas  fa-address-card"> </i> Nom & prenom  : </td><td style="font-weight:bold;" >{{ ShowColis.nom_client}}</td> </tr>


<tr>
<td> <i class="fas fa-map"> </i> Wilaya : </td><td style="font-weight:bold;" >{{ ShowColis.wilaya }}</td> </tr>
<tr>
<td> <i class="fas fa-phone"> </i> Numero de telephone : </td><td style="font-weight:bold;" >{{ ShowColis.tel}}</td> </tr>
<tr>
    <td> <i class="fas fa-money-bill "> </i> Prix  : </td><td style="font-weight:bold;" >{{ ShowColis.price}}</td> </tr>
<tr>
<td> <i class="fas fa-bars"> </i> Quantité : </td><td style="font-weight:bold;" >{{ ShowColis.qte}}</td> </tr>


<tr>
<td> <i class="fas fa-sitemap"> </i> Commune : </td><td style="font-weight:bold;" >{{ ShowColis.commune}}</td> </tr>
<tr>
<td> <i class="fas fa-map-marker-alt"> </i> Adresse : </td><td style="font-weight:bold;" >{{ ShowColis.adress}}</td> </tr>

<tr>
<td> <i class="fas fa-sticky-note"> </i>  Remarque : </td><td style="font-weight:bold;" >{{ ShowColis.remarque}}</td> </tr>

</tbody>

               </table>

                            </div>
                            
                        </div>
                    </div>
                </div>
</template>

<script>
export default {
    props:['ShowColis']  ,
    methods : {


    }  


}
</script>