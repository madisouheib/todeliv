<template>
    
        
  
                <div id="Modalinfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">information d'utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               <table class="table table-striped">
<tr>

<td> <i class="fas fa-user-tie"> </i> d'utilisateur : </td> <td> {{ ShowUser.name }}</td> </tr>
<tr>
<td> <i class="fas  fa-address-card"> </i> Nom & prenom  : </td><td>{{ ShowUser.full_name}}</td> </tr>
<tr>
<td> <i class="fas fa-envelope"> </i> Email : </td><td>{{ ShowUser.email}}</td> </tr>
<tr>
<td> <i class="fas fa-phone"> </i> Numero de telephone : </td><td>{{ ShowUser.phone}}</td> </tr>
<tr>
    <td> <i class="fas fa-id-card-alt "> </i> Type de compte : </td><td>{{ ShowUser.name_role}}</td> </tr>
<tr>

<tr>
<td> <i class="fas fa-sitemap"> </i> Hub : </td><td>{{ ShowUser.nom_hub}}</td> </tr>
<tr>
<td> <i class="fas fa-map-marker-alt"> </i> Adresse : </td><td>{{ ShowUser.adresse}}</td> </tr>




               </table>

                            </div>
                            
                        </div>
                    </div>
                </div>
</template>

<script>
export default {
    props:['ShowUser']  ,
    methods : {


    }  


}
</script>