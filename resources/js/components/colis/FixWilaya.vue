<template>
    

    
  
                <div id="FixWilaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> Correction de la nomination WILAYA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
 

                                <div class="form-group">
                                    <label for="validationCustomUsername">Wilaya : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map"></i> </span>
                                        </div>
                                            <select class="custom-select" name="" required v-model="namewilaya" >

 <option selected disabled> Selectionner  la wilaya  </option>

                                                <option  v-for="wil in wilayas " :key="wil.key" :value="wil.mat_wilaya"   >{{ wil.nom_wilaya }} - {{ wil.nom_wilaya_ar }} </option>

                                                
                                            </select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>
       
                             
                         

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary shadow-1 " data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button  @click="colis_edit_wilaya()"  type="button" class="btn btn-success shadow-1" data-dismiss="modal" >Corriger  <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

</template>

<script>
  
     
    export default {
         props:['idcolis']  ,
data(){
    return {


namewilaya:'',
wilayas :[],


    }
},
created ()
 {




this.getWilayas() ; 


 },
methods: {

   

colis_edit_wilaya(){
   
axios.patch('/api/fixwilaya', {
namewilaya : this.namewilaya,
idcolis : this.idcolis 




}).then(response=>this.$emit('wilaya-fixed',response)).catch(error => console.log(error))


},
 getWilayas()
 {


     axios.get('/api/getwilayas')
     .then(response =>
     { 
       
     this.wilayas = response.data
 
     
 }
     )
     .catch(err => console.log(err));

 }


},
           mounted() {
           
        }
    }


</script>