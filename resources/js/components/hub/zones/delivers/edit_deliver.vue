<template>
                <div id="Modaleditdeliver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier  le  livreur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               
                               


                            <div class="form-group">
                            <label for="Adressehub"> Min   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-amount-down-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" :min="0" v-model="ShowDeliver.min_deliver">

                            </div>
                            </div>


                                      <div class="form-group">
                             <label for="Adressehub"> Max    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" :min="0" v-model="ShowDeliver.max_deliver">

                            </div>
                            </div>
                                      <div class="form-group">
                            <label for="Adressehub"> Order    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-numeric-down-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" v-model="ShowDeliver.order_deliver">

                            </div>
                            </div>


              
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="deliver_edit()" data-dismiss="modal" >Modifier <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
            props:['ShowDeliver']  ,
data(){
    return {



namezone :'',


deliv :'',
order :'',
etat :'',
mymax: '',
mymin :''

    }
},
 created ()
 {






 },
methods: {

deliver_edit(){

axios.patch('/api/delivereditzone', {
max     : this.ShowDeliver.max_deliver ,
min     : this.ShowDeliver.min_deliver ,
order   :  this.ShowDeliver.order_deliver ,
idzone  : this.ShowDeliver.zone_deliver ,


}).then(resposne=>this.$emit('deliver-edited',resposne)).catch(error => console.log(error))


}




},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>