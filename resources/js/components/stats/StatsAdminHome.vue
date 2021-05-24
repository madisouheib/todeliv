<template>
    
                                      
<div class="row">
                                                 <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3">Reception</h5>
                                            <i class="fas  fa-box f-30 text-c-blue"></i>
                                            <h2 class="f-w-300 mt-3">{{ stats.rec + stats.nonrec  }}</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar progress-d-theme" role="progressbar" :style="'width: '+ ( ( stats.rec * 100) / stats.rec + stats.nonrec ) +'%; height:7px;'" :aria-valuenow="( stats.rec * 100) / stats.rec + stats.nonrec" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.rec}}</h4>
                                                    <span class="text-muted">Reçu</span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.nonrec }}</h4>
                                                    <span class="text-muted">Non Reçu </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
   <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3"> Livraison </h5>
                                            <i class="fas fas fa-truck f-30 text-c-green"></i>
                                            <h2 class="f-w-300 mt-3"> {{ stats.enliv + stats.livre  }}</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar progress-c-theme " role="progressbar" :style="'width: '+ ( ( stats.livre * 100) / ( stats.enliv + stats.livre )  ) +'%; height:7px;'" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                              
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.enliv }}</h4>
                                                    <span class="text-muted">En Livraison </span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.livre }}</h4>
                                                    <span class="text-muted"> Livrée </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>

   <div class="col-md-6 col-xl-4">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <h5 class="mb-3">Retour</h5>
                                            <i class="fas  fa-undo f-30 text-c-red"></i>
                                            <h2 class="f-w-300 mt-3">{{ stats.retour  + stats.ech }}</h2>
                                            <span class="text-muted">Nombre de colis </span>
                                            <div class="progress mt-4 m-b-40">
                                                <div class="progress-bar bg-danger" role="progressbar" :style="'width: '+ ( ( stats.retour * 100) / ( stats.ech + stats.retour )  ) +'%; height:7px;'" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row card-active">
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.ech }} </h4>
                                                    <span class="text-muted">Echouée </span>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <h4>{{ stats.retour }}</h4>
                                                    <span class="text-muted"> Retour </span>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>

    

                         
                                
                                    </div>

</template>

<script>

// Choose Locale

export default {
props: ['user_id'],
filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
     data(){
 return {
stats : {},



 }
  },
     created ()
{
this.getstats();


 },

 
 
    methods : {

           moment(arg) {
             return moment(arg);
         } ,

 getstats(){


axios.get('/api/stats/'+this.user_id)
     .then(response =>
     { 
       
   this.stats = response.data
     
     }
     ).catch(err => console.log(err));


}

    }  


}
</script>