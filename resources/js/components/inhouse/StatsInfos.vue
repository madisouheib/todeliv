<template>
    
    <div>  
  
                <div  id="ModalColisSuivi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-align-left"></i> Etat  Suivi de Colis </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
               <table class="table table-striped">
<thead class="thead-dark text-center" >
    <th>
     <i class="fas fa-user-cog "></i>   Utilisateur : 
    </th>
    <th>
        <i class="fas fa-edit"></i> 
        Action  : 
    </th>
    <th>
        <i class="fas fa-clock"></i> 
Date & Time :

    </th>



</thead>
<tr  v-for=" stat  in ShowStats " :key="stat.id_stast_colis "   >

<td>  <i class="fas fa-arrow-alt-circle-right"> </i>  {{ stat.name }}  </td>   <td>  <label class="badge badge-warning" style="padding:5px;font-size:14px;">  {{ stat.field_stats }} </label> </td> <td> <label class="badge badge-light" style="padding:4px;font-size:14px;">  Date :  {{ stat.created_at | moment  }} </label>   </td>  </tr>

                


               </table>

                      

                            </div>
                            
                        </div>
                    </div>
                </div>

 </div>
</template>


<script>

// Choose Locale

export default {
    props:['id_colis']  ,
filters: {
  moment: function (date) {
      
    return moment((date)).format('YYYY-MM-DD [à] hh:mm ');
  }
},
     data(){
 return {
ShowStats : {},



 }
  },
     created ()
{


 },

 
 
    methods : {

           moment(arg) {
             return moment(arg);
         } ,
 getstats(id){


axios.get('/api/getstatus/'+id)
     .then(response =>
     { 
       
   this.ShowStats = response.data
     
 }
     ).catch(err => console.log(err));


}

    }  


}
</script>