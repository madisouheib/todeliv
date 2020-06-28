<template>
        <div>
            <div class="table-responsive">                 
                
                      <table class="table">
    
                                    <thead>
                                        <tr>
                                            <th class="text-center" > <i class="fas fa-folder-open"></i> manifest-id </th>
                            
                                            <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant Total</th>
                                            <th class="text-center"><i class="fas fa-cubes"></i> Nombre colis  </th>
                        

                                        <th class="text-center" ><i class="fas fa-address-card"></i> Hub </th>
                        
                                        <th class="text-center"><i class="fas fa-align-left"></i> Statuts </th>
                                        <th class="text-center"><i class="fas fa-edit"></i> Action </th>
                                        <th class="text-center"><i class="fas fa-save"></i> Exporter </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr v-for=" com  in coms.data" :key="com.id_coms" >
                                       
                                        <th scope="row" class="text-center" > <a class="pcoded-badge label label-info" style="color:white"  :href="'/admin/listcolis/'+com.id_coms">  <i class="fas fa-folder-open"></i>  #Manif- {{ com.id_coms}}  <i class="fas fa-list"></i>  </a></th>
                                     
                                        
                        
                                      <th class="text-center"   > 3500000 DA   </th>
                                      <th class="text-center" >{{ com.colis_count}}    </td>
                                    
                                       
                                        <th class="text-center"> ORAN EST   </th>
                                        <td class="text-center" >  <i class="fas fa-clock"></i>   </td>
                        
                                        <td class="text-center" > <a  :href="'addcoms/'+com.id_coms" class="btn btn-square btn-success btn-sm ">Uploader  <i class="fas fa-upload"></i>  </a> </td>
                                        <th class="text-center" > <a :href="'/admin/export/'+com.id_coms" class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </a> <button class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </button>  </th>
                                    </tr>
                                 
                  
                                </tbody>
                            
                            </table>
                         <pagination :data="coms" @pagination-change-page="getComs">

    </pagination>
                        </div>

</div>
</template>





<script>

  export default {
     props: ['id_user'],
     
 components: {


  },

     data(){
 return {
coms:{}


 }
  },
 created ()
 {



this.getComs();
 },
 
 methods:{

getComs(page = 1)
 {
var id = this.id_user ; 

     axios.get('/api/getcoms/'+id+'?page='+page)
     .then(response =>
     { 
       
   this.coms= response.data
   console.log(response.data)
     
 }
     ).catch(err => console.log(err));

 }
 }


     }

      


</script>