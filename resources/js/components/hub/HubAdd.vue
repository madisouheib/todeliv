<template>
        
  
                <div id="Modaladdhub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un Hub</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namehub">Nom de hub : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > <i class="fas fa-play"></i> </span>
                                        </div>
                                        <input type="text" name="namehub"  v-model="namehub" class="form-control" id="namehub" placeholder="Nom de hub " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a hub.
                                        </div>
                                    </div>
                                </div>
                  
                          
                                <div class="form-group">
                                    <label for="Adressehub">Adresse   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Adressehub"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="idwilaya">
    <option       v-for="wilaya in wils " :key="wilaya.id_wilaya"  :value=" wilaya.id_wilaya "  > {{ wilaya.nom_wilaya}}   </option>
    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>
                       
<div class="form-group">
    <label for="validationCustomUsername"><i class="fas fa-map"></i> wilayas  : </label>
<div>

    <select-data
      ref="multiSelect"
      v-model="values"

    
      :options="options"
     
    
      :selectOptions="data_op">
      <template v-slot:option="{option}">
        <input type="checkbox"  :value="option.key" :checked="option.selected" class="form-control" />
        <span>{{option.name}}</span>
      </template>
    </select-data>
  
</div>


</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button @click="hubstore" data-dismiss="modal"  type="button" class="btn btn-success">Ajouter <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
</template>

<script>
  
import vueMultiSelect from 'vue-multi-select';
import 'vue-multi-select/dist/lib/vue-multi-select.css';
    export default {
components: {
    "select-data" : vueMultiSelect
  },
 

     data(){
 return {
     namehub :'',
     idwilaya : '',
     wils :{},
     axios,
      name: 'first group',
      values: [],
      data_op: [{
 list : []
      }],
      filters: [{
        nameAll: 'Select all',
        nameNotAll: 'Deselect all',
        
        func() {
          return true;
        },
      }
      ],
      options: {
        multi: true,
        groups: true,
      },


 }
 },
  created ()
 {


this.GetWilayas() ; 

this.Wilayas() ; 

 },
    mounted() { 



    },
    methods: {


        GetWilayas(){

   axios.get('/api/getwilayas/')
     .then(response => this.data_op[0].list.push.apply(this.data_op[0].list,response.data))
     .catch(err => console.log(err));





 }, Wilayas(){

   


     axios.get('/api/getallwilayas')
     .then(response =>
     { 
       
     this.wils = response.data
     
 }
     )
     .catch(err => console.log(err));

 



 },
 hubstore(){
 
axios.post('/api/addhub', {
name_hub: this.namehub, 
id_wilaya : this.idwilaya ,
wilayas : this.values 


}).then(
 
  resposne=>location.reload() 
  
  // method call to method2 
   ).catch(error => console.log(error))


}
    }

    }

    </script>