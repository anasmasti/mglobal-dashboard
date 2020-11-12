<template>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-school"></i>
        </span> Participants | Mediexperts Academy </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Aperçu <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                          <th>E-Mail</th>
                          <th>Telephone</th>
                          <th>S'est inscrit le</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(p,idx) in participants" :key="idx">
                          <td>{{p.nom}}</td>
                          <td>{{p.prenom}}</td>
                          <td>{{p.email}}</td>
                          <td>{{p.phone}}</td>
                          <td>{{p.created_at | moment("dddd, MM Do YYYY")}}</td>
                          <td>
                          <button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </button> <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon">
                            <i class="mdi mdi-delete"></i>
                          </button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    </div></div></div>
</template>
<script>
export default {
  data(){
    return {
      participants:{}
    }
  },
  created(){
    this.axios.get(this.api_url+'/mediexperts-academy/participants').then( data =>{
     this.participants = data.data
    })
  }
}
</script>