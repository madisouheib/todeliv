<template>
    
        
  
                <div id="MessageClient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalCenterTitle">Message De Partenaire  <i class="fas fa-envelope"></i> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
     
<h4 class="text-center">  {{ Message }}  </h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
</template>

<script>
export default {
    props:['Message']  ,
    methods : {


    }  


}
</script>