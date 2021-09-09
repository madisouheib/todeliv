<template>
                <div id="ModaladdDeliver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter  un livreur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               
                               

   <div class="form-group">
                                    <label for="Adressehub"> Selectionner le livreur    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-shipping-fast"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="deliv" >

    <option       v-for="deliver in delivers " :key="deliver.id"  :value="deliver.id "  > {{ deliver.name}}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group">
                            <label for="Adressehub"> Min   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-amount-down-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" :min="0" v-model="mymin">

                            </div>
                            </div>


                                      <div class="form-group">
                             <label for="Adressehub"> Max    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-amount-up-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" :min="0" v-model="mymax">

                            </div>
                            </div>
                                      <div class="form-group">
                            <label for="Adressehub"> Order    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-sort-numeric-down-alt"></i> </span>
                                        </div>
                                        <input class="form-control" name="sta" type="number" v-model="order">

                            </div>
                            </div>

                                <div class="form-group">
                                    <label for="Adressehub"> Etat    : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-power-off"></i> </span>
                                        </div>
                                        <select class="custom-select" name="" required v-model="etat" >

                                            <option      :value="1"  > Activé  </option>

                                            <option        :value="0"  > Désactiver </option>
                                            
                                        </select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>

              
                  
                          
                        
                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-success" @click="deliver_add()" data-dismiss="modal" >Ajouter <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
              </template>
<script>
  
     
    export default {
            props:['zone']  ,
data(){
    return {



namezone :'',

delivers :{},
deliv :'',
order :'',
etat :'',
mymax: '',
mymin :''

    }
},
 created ()
 {

this.get_delivers() ; 




 },
methods: {

deliver_add(){
axios.post('/api/deliveraddzone', {
max: this.mymax,
min : this.mymin,
order :  this.order ,
deliver : this.deliv ,
idzone : this.zone ,
etat : this.etat

}).then(resposne=>this.$emit('deliver-added',resposne)).catch(error => console.log(error))


},
get_delivers(){
axios.get('/api/getzdelivers/'+this.zone).then(resposne=> this.delivers = resposne.data).catch(error => console.log(error))


}




},
           mounted() {
            console.log('Component mounted.')
        }
    }


</script>