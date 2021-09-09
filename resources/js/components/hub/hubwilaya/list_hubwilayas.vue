
<template>
<div class="wil" >

    <div class="row">

<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">

<button class="btn btn-primary shadow-1 btn-sm" data-toggle="modal" data-target="#ModaladdWilHub"   > Ajouter une wilaya <i class="fas fa-plus"></i>    </button>

</div>

    </div>
       <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center" ><i class="fas fa-map"></i> Nom de la wilaya</th>
                                        <th class="text-center" ><i class="fas fa-map"></i> Nom en arabe</th>
                                    <th class="text-center" ><i class="fas fa-map-pin"></i> Mat de la wilaya</th>
                                      

                      
                                  

                                        <th class="text-center"><i class="fas fa-user-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" wilaya  in wilayas.data" :key="wilaya.id" >
                                        <th scope="row"> {{ wilaya.id_wilaya }} </th>
                                        <td class="text-center">{{ wilaya.nom_wilaya}}  </td>
                                          <td class="text-center">{{ wilaya.nom_wilaya_ar}}  </td>
                                          <td class="text-center" >{{ wilaya.mat_wilaya}}  </td>

                               
                    
                            

                                        <td class="text-center" > 

                                            <button data-toggle="modal" data-target="#Modaldelwilaya"  @click="ShowWilaya(wilaya.nom_wilaya,wilaya.id_hubwil)" class="btn btn-sm shadow-1    btn-danger "   ><i style="margin:0px;"  class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                 
                                 
                                </tbody>
                            </table>
                     

    <pagination :data="wilayas" @pagination-change-page="getWilayasHub">

    </pagination>
    <div>
      <wilaya-add  v-bind:hub="url_id" @wilaya-added="getWilayasHub"></wilaya-add>
            <wilaya-delete  v-bind:ShowWil="ShowWil" @wilaya-deleted="getWilayasHub"></wilaya-delete>
    </div>
</div>

</template>








<script>
import WilayaAdd from './add_hubwilaya' ; 
import WilayaDelete from './delete_hubwilaya' ; 

  export default {
     props:['url_id','user_id']  ,
 components: {
   'wilaya-add':  WilayaAdd  ,
   'wilaya-delete': WilayaDelete

  },

     data(){
 return {

wilayas : {},
ShoWilaya : '',

ShowWil : {
name_wilaya : '',
idlink : ''


}

 }
  },
 created ()
 {

this.getWilayasHub() ; 


 },
 
 methods:{
 getWilayasHub(page = 1)
 {


     axios.get('/api/wilayabyhub/'+this.url_id+'?page='+ page)
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





 },
 ShowWilaya(wilayaname,idlink){

this.ShowWil.name_wilaya  = wilayaname ;
this.ShowWil.idlink = idlink;

 }


 }


     }

      


</script>