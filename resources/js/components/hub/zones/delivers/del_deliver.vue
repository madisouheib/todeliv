<template>
                <div id="ModaldelzoneCom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Supprimmer  la commune </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form>
                          
<h5> etes vous usre de supprimmer la  commune  zone : ? </h5>

                              

                                </form>
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-danger" @click="zone_deletecom()" data-dismiss="modal" >Supprimmer  <i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
        props:['ideliver']  ,
data(){
    return {



namezone :'',
hubid:'',


    }
},
 created ()
 {






 },
methods: {

zone_deletecom(){
axios.post('/api/delzondeliver', {
ideliver: this.ideliver,




}).then(resposne=>this.$emit('deliver-deleted',resposne)).catch(error => console.log(error))


},


},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>