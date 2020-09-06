<template>
    
    <div>  
  
                <div id="ModalColisAction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-align-left"></i> Etat  Suivi de Colis </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">   


             <i style="font-size:4em;" class="fas fa-exclamation-circle"></i> <br>

                                </div>
                   
              <div class="form-group">


<label style="font-weight:bold;"> <i class="fas fa-pallet"></i> Action  :    </label>
<select class="form-control"  @change="ShowTextarea(idstat)"     v-model="idstat">

     <option      v-for="stat in stats " :key="stat.id_stats"  :value=" stat.id_stats "  > {{ stat.field_stats}}    </option>

</select>


              </div>


              <div  v-if="seen == true" class="form-group">
                  <label> Remarque :   </label>

<textarea  class="form-control">


</textarea>


              </div>


                            </div>
                            <div class="modal-footer">  <button class="btn btn-success " data-dismiss="modal" @click="AddStats()"> Confirmer <i class="fas fa-check-circle"></i>  </button>  <button  data-dismiss="modal"  class="btn btn-dark "> Fermer <i class="fas fa-window-close"></i>  </button>    </div>
                        </div>
                    </div>
                </div>

 </div>
</template>


<script>
export default {
    props:['addstats']  ,
       data(){
 return {
stats:{},
idstat : '' ,
seen : false



 }
  },
  
 created ()
 {




this.GetStats();


 },
    methods : {


 GetStats(){




 axios.get('/api/getstats')
     .then(response =>
     { 
       
   this.stats = response.data
     
 }
     ).catch(err => console.log(err));

 },
 ShowTextarea(id){

if(id == 8 )
{

this.seen = true


}else {


this.seen = false

}




 },
  AddStats(){

axios.post('/api/addstatscolis', {
idcolis: this.addstats.id_colis,
idstats : this.idstat,
iduser : this.addstats.userid



}).then(
    
    
    
    
    resposne=>this.$emit('colis-added',resposne)
    
    
    
    
    ).catch(error => console.log(error))




 }

    }  


}
</script>