<template>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-school"></i>
        </span> Messages | MySys </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Aperçu <i data-toggle="tooltip" data-placement="top" title="Sur cette page tu peux apercevoir les messages des clients." class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
    <div class="col-12">
             <div class="col-lg-12 grid-margin stretch-card mt-5">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Messages</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom et Prènom</th>
                          <th>E-mail</th>
                          <th>Téléphone</th>
                          <th>Le</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(m,idx) in messages" :key="idx">
                          <td class="font-weight-bold">{{m.name}}</td>
                          <td>{{m.email}}</td>
                          <td>{{m.phone}}</td>
                          <td>{{m.created_at | moment("dddd, MM Do YYYY")}}</td>
                          <td>
                          <button type="button" @click="fetchMessage(m.id)" data-toggle="modal" data-target="#exampleModalCenter5" class="btn btn-inverse-success btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </button> <button type="button" @click="deleteMessage(m.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                            <i class="mdi mdi-delete"></i>
                          </button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    </div></div>

   <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content p-5">
       <h2>Message De {{message_detail.name}}</h2>
       <p>{{message_detail.message}}</p>
       </div>
     </div>
   </div>
</div>
</template>
<script>
export default {
  data(){
    return {
      messages:{},
      message_detail:{}
    }
  },
  created(){
    this.axios.get(this.api_url+'/mysys/contact').then( data =>{
     this.messages = data.data
    })
  },
  methods: {
      fetchMessage(id){
          this.axios
           .get(`${this.api_url}/mysys/contact/${id}`)
           .then(response => {
              this.message_detail = response.data;
           });
       },
     deleteMessage(id){
          this.axios
           .delete(`${this.api_url}/mysys/contact/delete/${id}`)
           .then(response => {
            this.axios.get(this.api_url+'/mysys/contact').then( data =>{
            this.messages = data.data})
            this.$toastr.s("Message supprimé avec succès");
           });
       },
  },
}
</script>