<template>
        
  
                <div id="Modaldelwilaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Supprimmer  la wilaya </h5>

                            </div>
                            <div class="modal-body">
                            
                  
                  <h5 class="text-center" style="color:red;"> etes vous sure de Supprimmer la wilaya : {{ ShowWil.name_wilaya }}  ? </h5>
                       


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button @click="wilaya_delete()" data-dismiss="modal"  type="button" class="btn btn-success">Ajouter <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>

<script>
  

    export default {
          props:['ShowWil']  ,
components: {

  },
 

     data(){
 return {
     namehub :'',
     idwilaya : '',




 }
 },
  created ()
 {





 },
   
    methods: {



 wilaya_delete(){
 
axios.patch('/api/delwiltohub', {
wilaya: this.ShowWil.idlink, 



}).then(
resposne=>this.$emit('wilaya-deleted',resposne)
   ).catch(error => console.log(error))


}
    }

    }

    </script>