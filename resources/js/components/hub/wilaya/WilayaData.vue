
<template>
<div class="wil" >
       <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-map"></i> Nom de la wilaya</th>
                                      
                         
                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" wilaya  in wilayas.data" :key="wilaya.id" >
                                        <th scope="row"> {{ wilaya.id_wilaya }} </th>
                                        <td>{{ wilaya.nom_wilaya}}  </td>
                               
                    
                            

                                        <td class="text-center" > <button data-toggle="modal" data-target="#Modaleditwilaya"  class="btn   btn-square   btn-info"  @click="GetWilayaId(wilaya.id_wilaya)"  ><i  style="margin:0px;"  class="fas fa-edit"></i></button>
                                        
                                            <button data-toggle="modal" data-target="#Modaldelwilaya"  class="btn btn-square  btn-danger " @click="GetWilayaId(wilaya.id_wilaya)"   ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                 
                                 
                                </tbody>
                            </table>
                     

    <pagination :data="wilayas" @pagination-change-page="getWilayas">

    </pagination>
    <div>
    <wilaya-add @wilaya-added="getWilayas"></wilaya-add>
        <wilaya-edit v-bind:ShoWilaya="ShoWilaya"  @wilaya-edit="getWilayas" > </wilaya-edit>
              <wilaya-delete v-bind:ShoWilaya="ShoWilaya"  @wilaya-delete="getWilayas" > </wilaya-delete>
    </div>
</div>

</template>








<script>
import WilayaAdd from './WilayaAdd' ; 
import WilayaEdit from './WilayaEdit' ; 
import WilayaDel from './WilayaDelete' ; 

  export default {

 components: {
    
   'wilaya-add' :  WilayaAdd,
   'wilaya-edit': WilayaEdit ,
   'wilaya-delete' : WilayaDel 
  },

     data(){
 return {

wilayas : {},
ShoWilaya : ''

 }
  },
 created ()
 {

this.getWilayas() ; 


 },
 
 methods:{
 getWilayas(page = 1)
 {


     axios.get('/api/wilaya?page='+ page)
     .then(response =>
     { 
       
     this.wilayas = response.data
     
 }
     )
     .catch(err => console.log(err));

 },
 GetWilayaId(id_wilaya){

   axios.get('/api/showilaya/'+ id_wilaya)
     .then(response => this.ShoWilaya = response.data)
     .catch(err => console.log(err));





 }


 }


     }

      


</script>