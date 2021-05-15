<template>
    



            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Générale</label>
                    </li>
                
           
    


                                   <li data-username="Animations" class="nav-item"><a :href="'/admin/deliver'" class="nav-link"><span class="pcoded-micon"><i class="fas fa-check-circle
"></i></span><span class="pcoded-mtext">Mes livraisons</span> <span class="pcoded-badge label label-success"> {{ stats.livre }}</span>  </a></li>

  




             

                                

                </ul>
            </div>
  
</template>


<script>

// Choose Locale

export default {
props:['user_id'],
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