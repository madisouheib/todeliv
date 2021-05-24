<template>
<div>

<div class="row"> 

<div class="card-body col-12">  
        <div v-if="stats == true" class="alert alert-success" role="alert">
   vous avez bien mis à jour votre bordeau  ... 
</div>
        <form enctype="multipart/form-data" action="/api/updatbord">  
    <div class="row">   
<div class="col-12">
<img :src="DataBord.logo" style="display:block;heigth:100px;width:100px; margin-left:auto;margin-right:auto;">

</div>
<div class="form-group col-6 ">


    <label for="logo"> Logo : </label>
    <input class="form-control" name="file" type="file"  @change="onChange" >
</div>
<div class="form-group col-6 ">

    <label for="logo"> Brand : </label>
    <input class="form-control" name="brand" v-model="DataBord.brand" type="text" >
</div>
<div class="form-group col-6 ">

    <label for="logo"> Phone : </label>
    <input class="form-control" name="phone" v-model="DataBord.phone" type="text" >
</div>
<div class="form-group col-6">

    <label for="logo"> Notes : </label>
    <input class="form-control" name="notes" v-model="DataBord.notes" type="text" >
</div>
<div class="form-group col-6">

    <label for="logo"> Color : </label>
    <input class="form-control" name="color" type="color" v-model="DataBord.colors"  >
</div>
<div class="form-group col-6">

    <label for="logo"> Adresse : </label>
    <input class="form-control" name="adresse" type="text" v-model="DataBord.adresse"  >
</div>

</div>
 </form>
<button class="btn shadow-1 btn-primary"  @click="UpdateBord" > Mettre à jour <i class="fas fa-sync-alt"></i></button>
                        
                                     </div>
</div>
                 </div>                  
</template>


<script>


  export default {
 components: {
    
  
  },
 

     data(){
 return {
  DataBord : {},
  stats : false ,
  file :null


   
    };
     },
 created ()
 {


this.GetBordereau();



 },
 methods:{
  
 
  GetBordereau(){


         axios.get('/api/bordereau')
     .then(response =>
     { 
       
   this.DataBord = response.data

 }
     ).catch(err => console.log(err));

  } ,
    onChange(e) {
                this.file = e.target.files[0];
                
            },
    UpdateBord(e){

  const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                }

       let formData = new FormData();
                 formData.append('file', this.file);
                 formData.append('colors', this.DataBord.colors);
                 formData.append('phone', this.DataBord.phone);
                 formData.append('brand', this.DataBord.brand);
                 formData.append('notes', this.DataBord.notes);
                 formData.append('adresse', this.DataBord.adresse);

axios.post('/api/updatbord',formData,config).then(
    

this.GetBordereau(),
    this.stats = true
    
    ).catch(error => console.log(error))






 }
 


     }
  }

      


</script>