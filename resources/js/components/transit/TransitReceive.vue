<template>
    

<div>


        <!-- [ Main Content ] start -->
 

                    <div class="card-block ">

<div class="row">
<div class="col col-2">
     
    <div class="form-group">
                            
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-tasks"></i> </span>
            </div>
<select class="custom-select" required>
<option value="">Etat transit </option>
<option value="1">Valider</option>
<option value="1">Non Valider</option>
</select>

          
            <div class="invalid-feedback">
                Please choose a one.
            </div>
        </div>
    </div>

</div>
  
</div>








                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" ># Transit-id </th>
                                        <th class="text-center" ><i class="fas fa-calendar-minus"></i> Date Envoie </th>
                                        <th class="text-center" ><i class="fas fa-calendar-check"></i> Date Reçu </th>

                                        <th class="text-center" ><i class="fas fa-clipboard-list"></i> Nombre </th>
                   

                                        <th class="text-center" ><i class="fas fa-road"></i>           Destination </th>
        <th class="text-center"><i class="fas fa-align-left"></i>      Etat </th>
                                        <th class="text-center"><i class="fas fa-align-left"></i>      Statut </th>
                                                                                <th class="text-center"><i class="fas fa-align-left"></i>      Operation </th>

                                        <th class="text-center"><i class="fas fa-align-left"></i>      Exportation </th>
                                    </tr>
                                </thead>
                                <tbody >
                               
                                    <tr style="margin:5px;" v-for="trans in transit.data"  :key="trans.id"   >

                                        <td v-if="trans.confirmed == 1 " scope="row" class="text-center" ><span class="pcoded-badge label label-success">#transit- {{ trans.id_transit  }}   <i class="fas fa-list"></i> </span> </td>
                                                                                <td v-else scope="row" class="text-center" > <a :href="'/admin/transitrecp/'+trans.id_transit" class="pcoded-badge label label-warning" >#transit- {{ trans.id_transit  }}   <i class="fas fa-list"></i> </a>  </td>

                                        <td class="text-center" >  {{ trans.created_at | moment   }} </td>
                                          <td class="text-center" > <i class="fas fa-clock"></i> </td>
 
                                      <td class="text-center"   >  {{ trans.colis_count   }}  </td>
                                        <td class="text-center" >  {{ trans.nom_hub       }}  </td>

                                        <td class="text-center" style="padding-top:5px;" >
                                            
                                            <span v-if="trans.confirmed == false" style="margin-top:2px;" class="pcoded-badge label label-warning"> En attente    <i class="fas fa-user-clock"></i> </span>
                                                                                        <span v-else style="margin-top:2px;" class="pcoded-badge label label-success"> Reçu   <i class="fas fa-check-square"></i> </span>

                                            
                                            </td>
<td v-if="trans.confirmed == true" class="text-center">  
    <h6 style="font-style:italic;"> Bien Reçu </h6>
</td>
<td v-else class="text-center">
<button v-if="trans.colisapprvd_count == trans.colis_count " class="btn btn-sm btn-success btn-glow-success" @click="GetShow(trans.id_transit,trans.receive_hub)" data-toggle="modal" data-target="#ModalReceive" > valider <i class="fas fa-check"> </i></button>

<a v-else :href="'/admin/transitrecp/'+trans.id_transit"     type="button" class="btn btn-sm btn-info btn-glow-info" >  Veuillez valider tous les colis  <i class="fas fa-clock"></i></a>
 </td>
                                        <td class="text-center" > <button class="btn btn-outline-danger"> <i  style="margin:0px"  class="fas fa-file-pdf"></i> </button>   </td>
                                     
                                    </tr>
                                 
                      
                                </tbody>
                            </table>
                        </div>
                                         <pagination :data="transit" @pagination-change-page="GetTrasnit">

    </pagination>

                        <valid-recp v-bind:Show="Show" @transit-recu="GetTrasnit" ></valid-recp>
                    </div>
       
            <!-- [ basic-table ] end -->



</div>


</template>

<script>
import ReceiveValidTransit from './ReceiveValidTransit.vue' ;

export default {
    props:['user_id'],

 filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }},
    components :{


'valid-recp' : ReceiveValidTransit


    },
data(){
return {

transit : {},
Show : {
idcord : this.user_id ,
idtransit : '',
hub : ''

}


}


},
    created () {

this.GetTrasnit();

    },
    methods:{

GetTrasnit(page= 1){




     axios.get('/api/receivetrasnit/'+this.user_id+'?page='+page)
     .then(response =>
     { 
       
   this.transit = response.data

 }
     ).catch(err => console.log(err));




},
getInfosTransit(){

axios.get('/api/getnfostrans/'+this.user_id).then(
response =>  {
this.Show = response.data

}
).catch(err => console.log(err));

},
GetShow(id,hub){

this.Show.idtransit = id ;
this.Show.hub = hub ; 

}


    }




}
</script>