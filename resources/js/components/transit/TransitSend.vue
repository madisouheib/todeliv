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
  <div class="col">
        <div class="float-right">
        <button class="btn shadow-1 btn-success btn-sm"  data-toggle="modal" data-target="#ModaladdTR"  @click="getInfosTransit()" > Ajouter un transit  <i class="fas fa-plus-square"></i> </button>
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

                                        <th class="text-center"><i class="fas fa-align-left"></i>      Exportation </th>
                                    </tr>
                                </thead>
                                <tbody >
                               
                                    <tr style="margin:5px;" v-for="trans in transit.data"  :key="trans.id"   >

                                        <td v-if="trans.send_it == true " scope="row" class="text-center" ><span class="pcoded-badge label label-success">#transit- {{ trans.id_transit  }}   <i class="fas fa-list"></i> </span> </td>
                                                                                <td v-else scope="row" class="text-center" > <a :href="'/admin/transit/'+trans.id_transit" class="pcoded-badge label label-info" >#transit- {{ trans.id_transit  }}   <i class="fas fa-list"></i> </a>  </td>

                                        <td class="text-center" >  {{ trans.created_at | moment   }} </td>
                                          <td class="text-center" > <i class="fas fa-clock"></i> </td>
 
                                      <td class="text-center"   >  {{ trans.colis_count   }}  </td>
                                        <td class="text-center" >  {{ trans.nom_hub       }}  </td>

                                        <td class="text-center" style="padding-top:5px;" >
                                            
                                            <span v-if="trans.send_it == true " style="margin-top:2px;" class="pcoded-badge label label-success">  Reçu  <i class="fas fa-check-square"></i> </span>
                                                                                        <span v-else style="margin-top:2px;" class="pcoded-badge label label-warning"> Envoie   <i class="fas fa-clock"></i> </span>

                                            
                                            </td>
                                            <td class="text-center" v-if="trans.send_it == true "> <h6 style="color:#fff;font-style:italic;"> le transit est valider   </h6>   </td>

                                            <td class="text-center" v-else> 
                                                
                                                 <button v-if="trans.colis_count > 0 " type="button" @click="GetidTrans(trans.id_transit)"  class="btn btn-sm btn-glow-success btn-success" data-toggle="modal"  data-target="#ModalSend">  valider et envoyée   <i class="fas fa-check"></i> </button> 
                                                 
                                                 <h6 v-else style="font-style:italic;"> La Feuille de transit elle contient aucun colis  </h6>
                                                  </td>


                                        <td class="text-center" > <a  :href="'/admin/transitpdf/'+trans.id_transit"  class="btn btn-outline-danger"> <i  style="margin:0px"  class="fas fa-file-pdf"></i> </a>   </td>
                                     
                                    </tr>
                                 
                      
                                </tbody>
                            </table>
                        </div>
                                         <pagination :data="transit" @pagination-change-page="GetTrasnit">

    </pagination>

<add-transit v-bind:Show="Show"   > </add-transit>

                        <send-valid v-bind:idtransit="idtransit" @transit-valid="GetTrasnit"  ></send-valid>
                    </div>
       
            <!-- [ basic-table ] end -->



</div>


</template>

<script>
import SendTransit from './EnvoieTransit.vue' ;
import AddTransit from  './AddTransit.vue';


export default {
    props:['user_id'],

 filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }},
    components :{

'add-transit': AddTransit,
'send-valid': SendTransit 


    },
data(){
return {

transit : {},
Show : '',
idtransit : ''


}


},
    created () {

this.GetTrasnit();

    },
    methods:{

GetTrasnit(page= 1){




     axios.get('/api/sendtrasnit/'+this.user_id+'?page='+page)
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
GetidTrans (id){

this.idtransit = id ;


}


    }




}
</script>