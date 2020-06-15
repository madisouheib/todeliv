<template>
    


  
                <div id="Modaledithub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le Hub</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="validationCustomUsername">Nom de hub : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-play"></i> </span>
                                        </div>
                                        <input v-model="ShowHub.nom_hub" type="text" class="form-control" id="validationCustomUsername" placeholder="Nom de hub " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a hub.
                                        </div>
                                    </div>
                                </div>
                  
                          <input name="idhubs" type="text" ref="Hubi" id="idhubs" v-model="idhubs" value="" >
                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse   : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
   <select class="custom-select"  required >
    <option :value="ShowHub.id_wilaya" selected > {{ ShowHub.nom_wilaya }} </option>
    <option  v-for="wilaya in wils " :key="wilaya.id_wilaya"   :value=" wilaya.id_wilaya "          > {{ wilaya.nom_wilaya  }}   </option>

</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a region.
                                        </div>
                                    </div>
                                </div>
                       
<div class="form-group">
    <label for="validationCustomUsername"><i class="fas fa-map"></i> wilayas  : </label>
   
    <select-data
      ref="multiSelect"
      v-model="ShowHub.vals"

    
      :options="options"
     
    
      :selectOptions="data_op">
      <template v-slot:option="{option}">
        <input type="checkbox"  :value="option.key" :checked="option.selected" class="form-control" />
        <span>{{option.name}}</span>
      </template>
    </select-data>


</div>
<button type="button" class="btn btn-primary" @click="show">try </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button type="button" class="btn btn-primary">Modifier <i class="fas fa-save"></i></button>
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
    props:['ShowHub']  ,

    data() {
return {
   namehub :'',
    idhubs : '',

wils :{},
     axios,
      name: 'first group',
      values: this.ShowHub.vals,
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
      }


}



    }, 
    
    mounted(){


    },
    created ()
 {
   
this.GetWilayas() ; 

this.Wilayas() ; 
this.GetSelectedWilayas();

 } ,
 
    methods : {
        
 GetWilayas(){

   axios.get('/api/getwilayas/')
     .then(response => this.data_op[0].list.push.apply(this.data_op[0].list,response.data))
     .catch(err => console.log(err));





 },
 show(idhubs){


console.log(this.ShowHub.id_hub);
 },
 Wilayas(){

   


     axios.get('/api/getallwilayas')
     .then(response =>
     { 
       
     this.wils = response.data
     
 }
     )
     .catch(err => console.log(err));

 



 },
  GetSelectedWilayas(){ 


   axios.get('/api/GetSelectedWilaya/'+ this.ShowHub.id_hub)
     .then(response => this.values.push.apply(this.values,response.data))
     .catch(err => console.log(err));





 },
  updateHub(){
axios.patch('/api/edithub/'+ this.ShoWilaya.id_wilaya, {
name: this.ShoWilaya.nom_wilaya


}).then(resposne=>this.$emit('wilaya-edit',resposne)).catch(error => console.log(error))
    $('.toast-success').toast('show');

}

    }  


}
</script>