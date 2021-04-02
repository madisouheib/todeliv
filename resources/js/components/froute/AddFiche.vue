<template>
    
<div>

 
                <div id="Modaladdfroute" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">






                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-file-alt"></i> Ajouter une Feuille de route </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <label>   ID F-Route : </label>
                             
                                <span class="pcoded-badge label label-info">#FRoute- {{ this.idfiche + 1  }}   <i class="fas fa-list"></i> </span>
                        
             <div class="form-group" >


                 <label> <i class="fas fa-list-alt"></i>  Discription :    </label>

<input class="form-control" type="text" v-model="name"> 


             </div>
                                
                                    <div class="form-group">
                         
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-user-tag"></i> </span>
                                            </div>
                                <select class="custom-select" required v-model="idliv">
                                <option value="">Coursier </option>
                            <option v-for=" liv  in coursiers" :key="liv.id"  :value="liv.id"> {{ liv.name }}  </option>
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
                                <button type="button" class="btn btn-success"  data-dismiss="modal"  @click="fiche_add()">Ajouter   <i class="fas fa-file-alt"></i></button>
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



idliv:'',
coursiers : {},
idfiche : '',
notice : '',
name  : ''

    }
},
created ()
 {



this.getCoursier(),
this.getLastID()



 },
methods: {

   

fiche_add(){
axios.post('/api/addfiche', {
idcord: this.id_user,
idliv : this.idliv,
notice : this.notice,
name : this.name


}).then(resposne=>this.$emit('fiche-added',resposne)).catch(error => console.log(error))


},
 getCoursier()
 {



     axios.get('/api/getlivreur/'+this.id_user)
     .then(response =>
     { 
       
   this.coursiers= response.data
   
     
 }
     ).catch(err => console.log(err));


 },
 getLastID(){

 axios.get('/api/getlasf')
     .then(response =>
     { 
       
   this.idfiche= response.data
   
     
 }
     ).catch(err => console.log(err));


 }


},
           mounted() {
           
        }
    }


</script>