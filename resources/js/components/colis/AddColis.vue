<template>
    

    
  
                <div id="ModaladdColis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                       
                                <div class="form-group">
                                    <label for="nomprenom">Nom & prenom  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-address-card"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  v-model="name"  id="nomprenom" placeholder="Nom et prenom " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label for="nomprenom"> Prix  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class=" fas fa-money-bill"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  v-model="price"  id="price" placeholder="prix.. " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                   <div class="form-group">
                                    <label for="nomprenom"> Produit  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-box"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  v-model="produit"  id="produit" placeholder="Produit ...  " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                       <div class="form-group">
                                    <label for="nomprenom"> Quantité  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-boxes"></i> </span>
                                        </div>
                                        <input type="number" class="form-control"  v-model="qte"  id="qte" placeholder="Quantité ...  " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                             
                                <div class="form-group">
                                    <label for="ntel">N-tel : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" class="form-control" v-model="phone" id="phone" placeholder="Numéro de telephone " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a phone.
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label for="validationCustomUsername">Wilaya : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map"></i> </span>
                                        </div>
  <select class="custom-select" name="" required v-model="wilaya" >



    <option  v-for="wil in wilayas " :key="wil.key"   >{{ wil.name }} </option>

    
</select>

                                      
                                        <div class="invalid-feedback">
                                            Please choose a Hub .
                                        </div>
                                    </div>
                                </div>
          <div class="form-group">
                                    <label for="nomprenom"> Commune  : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-sitemap"></i> </span>
                                        </div>
                                        <input type="text" class="form-control"  v-model="commune"  id="nomprenom" placeholder="Commune ..  " aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a nom.
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label for="validationCustomUsername">Adresse : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"> <i class="fas fa-map-marker-alt"></i> </span>
                                        </div>
                                        <input type="text"  v-model="adresse" class="form-control" id="validationCustomUsername" placeholder="Adresse " aria-describedby="inputGroupPrepend" required>
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
                                        <input type="text"  v-model="remarque" class="form-control" id="validationCustomUsername" placeholder="Remarque .. " aria-describedby="inputGroupPrepend" required>
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
remarque:''


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
remarque:this.remarque


}).then(resposne=>this.$emit('colis-added',resposne)).catch(error => console.log(error))


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