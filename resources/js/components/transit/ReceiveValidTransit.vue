<template>
     
       
                <div id="ModalReceive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"> <i class="fas fa-check-circle"></i>Validation de transit </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <p> a ce vous-etes sure de Valider  la reception des colis de transit   </p><h5 v-text="Show.hub"> .?  </h5> 

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" @click="validRecpTransit"    data-dismiss="modal"   class="btn btn-success">Valider   <i class="fas fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
</template>



<script>
export default {
    props:['Show']  ,
data(){

return {

ShowData : this.Show 

}

},
    methods : {

  validRecpTransit(){

    
axios.patch('/api/recptransit',{
idtransit : this.ShowData.idtransit,
idcord : this.ShowData.idcord,
hub : this.ShowData.hub

}).then(resposne =>this.$emit('transit-recu',resposne)


).catch(error => console.log(error))
    $('.toast-success').toast('show');



}

    }  ,


}
</script>