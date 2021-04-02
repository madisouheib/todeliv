<template>
    
<div>

 
                <div id="Modaladdfacture" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">






                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-file-alt"></i> Ajouter une Feuille de route </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <label>   ID F-Route : </label>

                        
    
                                
                                    <div class="form-group">
                         
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tag"></i> </span>
                                            </div>
                                <select class="custom-select" required v-model="idpart">
                    
                            <option v-for=" clt  in clients" :key="clt.id"  :value="clt.id"> {{ clt.name }}  </option>
                                </select>
                                
                                          
                                            <div class="invalid-feedback">
                                                Please choose a Coursier.
                                            </div>
                                        </div>
                                    </div>
                      
                                    <div class="form-group">
                                        <label for="validationCustomUsername"> Remarque  : </label>
                                        <textarea class="form-control" v-model="notice"></textarea>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success"  data-dismiss="modal"  @click="facture_add()">Ajouter   <i class="fas fa-file-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


</div>


</template>



<script>
  
     
    export default {
         props:['id_user']  ,
data(){
    return {



idpart:'',
clients : {},
notice:''

    }
},
created ()
 {



this.getPartenaire()




 },
methods: {

   

facture_add(){
axios.post('/api/addfacture', {
idpart: this.idpart,
field : this.notice,



}).then(resposne=>this.$emit('facture-added',resposne)).catch(error => console.log(error))


},
 getPartenaire()
 {



     axios.get('/api/getclients')
     .then(response =>
     { 
       
   this.clients= response.data
   
     
 }
     ).catch(err => console.log(err));


 }




},
        
    }


</script>