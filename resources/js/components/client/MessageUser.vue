<template>
    
<div>

 
                <div id="ModaladdReclamation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">






                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-envelope"></i> Envoyez </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                   
                             

                        
         
                                
                              
                                    <div class="form-group">
                              
                                        <label for="validationCustomUsername"> Remarque  : </label>
                                        <textarea class="form-control" id="notice" :value="this.Message.field ">    </textarea>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success"  data-dismiss="modal"  @click="update_stats_user()">Ajouter   <i class="fas fa-file-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


</div>


</template>



<script>
  
     
    export default {
         props:['Message']  ,
data(){
    return {





notice : this.Message.field,
name  : ''

    }
},
created ()
 {








 },
methods: {

   

update_stats_user(){
     var mess = document.getElementById("notice").value;  

axios.patch('/api/updstatsuser', {
idstats: this.Message.idstats,
field : mess,



}).then(resposne=>this.$emit('stats-added',resposne)).catch(error => console.log(error))


}



},
           mounted() {
           
        }
    }


</script>