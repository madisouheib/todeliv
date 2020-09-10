<template>
    

     
                <div id="ModalsignByone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Signaler</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p> a  ce vous-etes sure de Signaler   ? </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-danger"  data-dismiss="modal" @click="signaler()">Signaler  <i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>



<script>
export default {
    props:['id_colis']  ,
    methods : {


signaler(){



axios.patch('/api/signalone/',{
id  : this.id_colis 


}).then(resposne=>this.$emit('colis-signaler',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');


}



    }  ,

    
    mounted(){



    }


}
</script>