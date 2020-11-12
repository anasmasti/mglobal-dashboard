<template>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-school"></i>
        </span> Participants | MySys </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Aperçu <i data-toggle="tooltip" data-placement="top" title="Sur cette page tu peux apercevoir les participants avec d'autre information par rapport à les informations." class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
    <div class="col-12">
             <div class="col-lg-12 grid-margin stretch-card mt-5">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Participants</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Formation</th>
                          <th>S'est inscrit le</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr v-for="(p,idx) in participants" :key="idx">
                          <td class="font-weight-bold">{{p.nom}}</td>
                          <td class="font-weight-bold">{{p.prenom}}</td>
                          <td>{{p.mysysformation.name}}</td>
                          <td>{{p.created_at | moment("dddd, MM Do YYYY")}}</td>
                          <td>
                          <button type="button" @click="fetchPar(p.id)" data-toggle="modal" data-target="#exampleModalCenter6" class="btn btn-inverse-success btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </button> <button type="button" @click="deletePar(p.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                            <i class="mdi mdi-delete"></i>
                          </button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    </div></div>
    <div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content p-5">
       <h2>{{participants_detail.nom}} {{participants_detail.prenom}}</h2>
       <p class="text-muted">{{participants_detail.email}}</p>
       <h4 class="text-primary">Participe Au Formation : {{participants_detail.mysysformation.name}}</h4>
       <h6 class="text-success">Plus Du Detail Sur Le Participant:</h6>
       <ul class="list-arrow">
       <li>Téléphone : <span class="text-capitalize font-weight-bold"> {{participants_detail.phone}}</span></li>
       <li>La Ville : <span class="text-capitalize font-weight-bold"> {{participants_detail.city}}</span></li>
       <li>Le Type: <span class="text-capitalize font-weight-bold"> {{participants_detail.type}}</span></li>
       </ul>
       <h6 class="text-success">Plus Du Detail Sur La Formation:</h6>
       <ul class="list-arrow">
       <li>Duration : <span class="text-capitalize font-weight-bold"> {{participants_detail.mysysformation.duration}}</span></li>
       <li>Catégorie : <span class="text-capitalize font-weight-bold"> {{participants_detail.mysysformation.category}}</span></li>
       <li>Prix : <span class="text-capitalize font-weight-bold">{{participants_detail.mysysformation.prix}} MAD</span> </li>
       </ul>
       </div>
     </div>
   </div>
    
    </div>
</template>
<script>
export default {
  data(){
    return {
      participants:{},
      participants_detail:{mysysformation:{}}
    }
  },
  created(){
    this.axios.get(this.api_url+'/mysys/participants').then( data =>{
     this.participants = data.data
    })
  },
 methods: {
  fetchPar(id){
      this.axios
       .get(`${this.api_url}/mysys/participants/${id}`)
       .then(response => {
          this.participants_detail = response.data;
       });
   },
  deletePar(id){
       this.axios
        .delete(`${this.api_url}/mysys/participants/delete/${id}`)
        .then(response => {
         this.axios.get(this.api_url+'/mysys/participants').then( data =>{
         this.participants = data.data})
         this.$toastr.s("Participant supprimé avec succès");
        });
    },
  },
}
</script>
