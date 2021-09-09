<template>
                <div id="ModaladdComZone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter  une commune</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               
                               

   <div class="form-group">
                                    <label for="Adressehub"> Selectionner la wilaya    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="wilaya" @change="get_comuns(wilaya)">

    <option       v-for="wil in wilayas " :key="wil.id_wilaya"  :value="wil.mat_wilaya "  > {{ wil.nom_wilaya}}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="Adressehub"> Selectionner la commune   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-map-signs"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="comun">
    <option       v-for="com in communs " :key="com.code_postal"  :value="com.code_postal"  > {{ com.nom }}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

                              

              
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="zone_comadd()" data-dismiss="modal" >Ajouter <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
            props:['zone']  ,
data(){
    return {



namezone :'',
comun:'',
wilayas :{},
communs : {},
wilaya :''

    }
},
 created ()
 {

this.get_wilayas() ; 




 },
methods: {

zone_comadd(){
axios.post('/api/addcomszone', {
commun: this.comun,
idzone : this.zone,



}).then(resposne=>this.$emit('commune-added',resposne)).catch(error => console.log(error))


},
get_wilayas(){
axios.get('/api/getwalls/'+this.zone).then(resposne=> this.wilayas = resposne.data).catch(error => console.log(error))


},
get_comuns(wilaya){
axios.get('/api/zonegetcomuns/'+this.zone+'/'+wilaya).then(resposne=> this.communs = resposne.data).catch(error => console.log(error))


}


},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>