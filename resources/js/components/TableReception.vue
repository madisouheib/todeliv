<template>
    <div>
    <stats-card></stats-card>

    <table class="table">
   
        <thead>
            <tr>
                <th class="text-center" ># manifest-id </th>

                <th class="text-center" ><i class="fas fa-money-bill-wave"></i> Montant Total</th>
                <th class="text-center"><i class="fas fa-map-marker-alt"></i> Nombre colis  </th>

                <th class="text-center" ><i class="fas fa-address-card"></i> partenaire </th>
                <th class="text-center" ><i class="fas fa-address-card"></i> Hub </th>

                <th class="text-center"><i class="fas fa-align-left"></i> Statuts </th>
                <th class="text-center"><i class="fas fa-edit"></i> Action </th>
                <th class="text-center"><i class="fas fa-save"></i> Exporter </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="text-center" > <span class="pcoded-badge label label-info">  #manif-0438340 <i class="fas fa-list"></i> </span> </th>
                

              <th class="text-center"   > 3500000 DA   </th>
              <th class="text-center" >30/30 </td>
            
                <th class="text-center" >Sarl X </th>
                <th class="text-center"> ORAN EST   </th>
                <td class="text-center" > <span class="pcoded-badge label label-warning"> en attente <i class="fas fa-clock"></i>  </span> </td>

                <td class="text-center" > <button class="btn btn-square btn-success btn-sm ">valider <i class="fas fa-check-circle"></i>  </button> </td>
                <th class="text-center" > <button class="btn btn-outline-success"> <i  style="margin:0px"  class="fas fa-file-excel"></i> </button> <button class="btn btn-outline-danger"> <i  style="margin:0px" class="fas fa-file-pdf"></i> </button>  </th>
            </tr>
         

        </tbody>
    </table>

</div>
</template>

<script>


     import StatsCard from './stats/StatsCard'

   
    export default {

        components: {
     'stats-card': StatsCard 
    }
    
    }

 
</script>
