<template>
    

    
  
                <div id="ModaladdColis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un colis</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                       
                                <div class="form-group">
                                    <label style="font-weight:bold;"   for="nomprenom">Nom & prenom  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-address-card"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  onfocus="this.value=''"   v-model="name"  id="nomprenom" placeholder="Nom et prenom " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label style="font-weight:bold;"  for="nomprenom"> Prix  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class=" fas fa-money-bill"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  onfocus="this.value=''"   v-model="price"  id="price" placeholder="prix.. " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                   <div class="form-group">
                                    <label style="font-weight:bold;"  for="nomprenom"> Produit  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-box"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  onfocus="this.value=''"  v-model="produit"  id="produit" placeholder="Produit ...  " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                       <div class="form-group">
                                    <label style="font-weight:bold;"   for="nomprenom"> Quantité  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-boxes"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" onfocus="this.value=''"   v-model="qte"  id="qte" placeholder="Quantité ...  " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label style="font-weight:bold;"  for="validationCustomUsername">Livraison : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map"></i> </span>
                                        </div>
  <select class="custom-select"  required v-model="livraison" >



<option :value="true" >  STOP DESK </option>
<option :value="false" >   à domicile  </option>

    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label style="font-weight:bold;"  for="ntel">N-tel : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" onfocus="this.value=''"  v-model="phone" id="phone" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                                      <div class="form-group">
                                    <label style="font-weight:bold;" for="ntel">Livraison gratuite : </label>
                                  
                                        <input type="checkbox" class="form-control input-lg"  v-model="free"  id="phone" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                     
                                </div>
                             
                                <div class="form-group">
                                    <label style="font-weight:bold;"  for="validationCustomUsername">Wilaya : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map"></i> </span>
                                        </div>
  <select class="custom-select"  @change="GetCommunes(wilaya)"  v-model="wilaya" >



    <option  v-for="wil in wilayas " :value="wil.mat_wilaya"  :key="wil.key"    >{{ wil.nom_wilaya }} - {{ wil.nom_wilaya_ar }}  </option>

    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" v-if=" free == true ">
<div class="theme-bg text-center"  >
<label style="color:#fff;"> <b>  Prix de livraison : </b> </label>
    <h4 style="color:#fff;"> <div v-if="livraison == true" > {{ pricing.stopdesk }} </div>   <div v-else> {{ pricing.price_home }} </div>  <i style="color:#fff;" class="fas fa-credit-card"></i> </h4>
</div>

                                </div>
       
                                      <div class="form-group">
                                    <label for="validationCustomUsername">Commune : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-shipping-fast"></i> </span>
                                        </div>
  <select class="custom-select"  required v-model="commune" >



    <option  v-for="coms in communes " :key="coms.key" :value="coms.code_postal"    >{{ coms.nom }} </option>

    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text"  v-model="adresse" onfocus="this.value=''"  class="form-control" id="validationCustomUsername" placeholder="Adresse " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a adresse.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomUsername">Remarque : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-sticky-note"></i> </span>
                                        </div>
                                        <input type="text"  v-model="remarque" onfocus="this.value=''"  class="form-control" id="validationCustomUsername" placeholder="Remarque .. " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a adresse.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer <i class=" fas fa-window-close"></i> </button>
                                <button  @click="colis_add()"  type="button" class="btn btn-success" data-dismiss="modal" >Ajouter  <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

</template>

<script>
  
     
    export default {
         props:['GetInf']  ,
data(){
    return {


name:'',
commune:'',
qte :'',
phone: '',
produit:'',
adresse : '',
name: '',
wilayas :[],
wilaya:'',
price :'',
remarque:'',
livraison : '',
communes : {},
free : false ,
pricing: []


    }
},
created ()
 {




this.getWilayas() ; 


 },
methods: {

   

colis_add(){
axios.post('/api/addcolis', {

name: this.name,
produit : this.produit,
phone  : this.phone,
qte : this.qte , 
adresse : this.adresse,
wilaya:this.wilaya,
commune:this.commune,
idcom : this.GetInf.idcom,
iduser : this.GetInf.userid,
price : this.price,
livraison : this.livraison ,
remarque:this.remarque


}).then(resposne=>this.$emit('colis-added',resposne)).catch(error => console.log(error))


},
GetCommunes(wilaya){
  axios.get('/api/getcommunesbywil/'+wilaya+'/'+this.GetInf.userid)
     .then(response =>
     { 
       
     this.communes = response.data.communes
     this.pricing  = response.data.price 
 
     
 }
     )
     .catch(err => console.log(err));



},
 getWilayas()
 {


     axios.get('/api/getwilayas')
     .then(response =>
     { 
       
     this.wilayas = response.data
 
     
 }
     )
     .catch(err => console.log(err));

 }


},
           mounted() {
           
        }
    }


</script>