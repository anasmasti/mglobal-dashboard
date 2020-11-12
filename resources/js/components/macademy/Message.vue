<template>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-school"></i>
        </span> Messages | Mediexperts Academy </h3>
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
                    <h4 class="card-title">Messages</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom et Prènom</th>
                          <th>E-mail</th>
                          <th>Message</th>
                          <th>Le</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr v-for="(m,idx) in messages" :key="idx">
                          <td>{{m.name}}</td>
                          <td>{{m.email}}</td>
                          <td>{{m.phone}}</td>
                          <td>{{m.created_at | moment("dddd, MM Do YYYY")}}</td>
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
      messages:{}
    }
  },
  created(){
    this.axios.get(this.api_url+'/mediexperts-academy/contact').then( data =>{
     this.messages = data.data
    })
  }
}
</script>