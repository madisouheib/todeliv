<template>
    
    <div>  
  
                <div id="ModalColisAction" class="modal ModalColisAction  fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-align-left"></i> Mettre à jour le colis </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover">
<tr>
<td> <i class="fas  fa-address-card"> </i> Nom & prenom  : </td><td style="font-weight:bold;" >{{ addstats.ShowColis.nom_client}}</td> </tr>
<tr>
<td> <i class="fas fa-map"> </i> Wilaya : </td><td style="font-weight:bold;" >{{ addstats.ShowColis.wilaya }}</td> </tr>
<tr>
<td> <i class="fas fa-phone"> </i> Numero de telephone : </td><td style="font-weight:bold;" >{{ addstats.ShowColis.tel}}</td> </tr>
<tr>
    <td> <i class="fas fa-money-bill "> </i> Prix  : </td><td style="font-weight:bold;" >{{ addstats.ShowColis.price}}</td> </tr>







                                </table>
                                <div class="text-center">   


             <i style="font-size:4em;" class="fas fa-exclamation-circle"></i> <br>

                                </div>
             
              <div class="form-group">


<label style="font-weight:bold;"> <i class="fas fa-pallet"></i> Action :    </label>
<select class="form-control"  @change="ShowTextarea(idstat)"      v-model="idstat">
<option value="all" >  Re-dispatcher </option>
     <option      v-for="stat in stats " :key="stat.id_stats"  v-if=" stat.order_stats == 1 "    :value=" stat.id_stats "  > {{ stat.field_stats}}    </option>

</select>


              </div>


                 <div v-if="secondselect == true" class="form-group">


<label style="font-weight:bold;"> <i class="fas fa-question-circle"></i> Raison  :    </label>
<select class="form-control"      v-model="idstatech">

     <option      v-for="statech in stats " :key="statech.id_stats"  v-if="statech.order_stats == 5 "    :value=" statech.id_stats "  > {{ statech.field_stats}}    </option>

</select>


              </div>


              <div  v-if="seen == true" class="form-group">
                  <label> Remarque :   </label>

<textarea  class="form-control">


</textarea>


              </div>


                            </div>
                            <div class="modal-footer">  <button class="btn btn-success " data-dismiss="modal" @click="AddStats()"> Confirmer <i class="fas fa-check-circle"></i>  </button>  <button  data-dismiss="modal"  class="btn btn-dark "> Fermer <i class="fas fa-window-close"></i>  </button>    </div>
                        </div>
                    </div>
                </div>

 </div>
</template>


<script>
export default {
    props:['addstats'],
    
    data(){

 return {

    stats:{} ,
    idstat : '' ,
    seen : false ,
    secondselect: false ,
    idstatech: ''

 }
  },
  
 created ()
 {




this.GetStats();


 },
    methods : {


 GetStats(){

        axios.get('/api/getstats')
            .then(response =>
            { 
            
        this.stats = response.data
            
        }
            ).catch(err => console.log(err));

 },
 ShowTextarea(id){

                    if(id == 8 )
                    {

                       this.seen = true


                    }else if(id == 5 || id == 'all' ){


                      this.secondselect = true

                    }else {

                     this.seen = false
                     this.secondselect = false

                    }




 },
  AddStats(){

    if(this.idstat == 'all'){

    status = this.idstatech


    axios.post('/api/addstatsredsip', {

                idcolis: this.addstats.id_colis,

                idstats : status,
                iduser : this.addstats.userid



          }).then(
    
    
    
    
      resposne=>this.$emit('colis-added',resposne)
    
    
    
    
    ).catch(error => console.log(error))


}else {


    if(this.idstat == 5 ) {

    status = this.idstatech
    
    }else {

    status = this.idstat


}
        axios.post('/api/addstatscolis', {
                idcolis: this.addstats.id_colis,

                idstats : status,
                iduser : this.addstats.userid



        }).then(
            
            
            
            
            resposne=>this.$emit('colis-added',resposne)
            
            
            
            
            ).catch(error => console.log(error))






                                }   




                                }  
                    }  


        }   

</script>