<template>
        
  
                <div id="ModaladdWilHub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une wilaya </h5>

                            </div>
                            <div class="modal-body">
                            
                  
                          
                                <div class="form-group">
                                    <label for="Adressehub">wilaya   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="idwilaya">
    <option       v-for="wilaya in wils " :key="wilaya.id_wilaya"  :value=" wilaya.mat_wilaya "  > {{ wilaya.nom_wilaya}}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>
                       
                          
                                <div class="form-group">
                                    <label for="Adressehub">Prix StopDesk   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-dolly-flatbed"></i> </span>
                                        </div>
<input class="form-control" v-model="stopdesk" type="number" >

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Adressehub">Prix livraison   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-credit-card"></i> </span>
                                        </div>
<input class="form-control" v-model="price_home" type="number" >

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="Adressehub">Comission livreur   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-shipping-fast"></i> </span>
                                        </div>
<input class="form-control" v-model="comission" type="number" >

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button @click="wilaya_store()" data-dismiss="modal"  type="button" class="btn btn-success">Ajouter <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>

<script>
  

    export default {
          props:['hub']  ,
components: {

  },
 

     data(){
 return {
     namehub :'',
     idwilaya : '',
     wils :{},
     comission : '',
     stopdesk : '',
     price_home :''



 }
 },
  created ()
 {




this.Wilayas() ; 

 },
    mounted() { 



    },
    methods: {


Wilayas(){

   


     axios.get('/api/getallwilayas')
     .then(response =>
     { 
       
     this.wils = response.data
     
 }
     )
     .catch(err => console.log(err));

 



 },
 wilaya_store(){
 
axios.post('/api/addwiltohub', {
wilaya: this.idwilaya, 
hub : this.hub ,
comission : this.comission,
price_home : this.price_home,
stopdesk: this.stopdesk


}).then(
resposne=>this.$emit('wilaya-added',resposne)
   ).catch(error => console.log(error))


}
    }

    }

    </script>