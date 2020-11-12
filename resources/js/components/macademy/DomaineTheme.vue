<template>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-cards-outline"></i>
      </span> Domaine et Theme | Mediexperts Academy </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Aperçu <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
   <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Theme</h4>
            <p class="card-description"> Ajouter un theme </p>
            <form class="forms-sample"  @submit.prevent="addTheme()">
              <div class="form-group">
                <label for="theme_name">Nom du theme</label>
                <input type="text" class="form-control" v-model="themes.name" placeholder="Nom du theme">
              </div>
              <div class="form-group">
                <label for="domaine">Le domaine associé</label>
                <select class="form-control" v-model="themes.domaine" >
                        <option v-for="(domaine, idx) in domaines" :key="idx" :value="domaine.id" >{{domaine.name}}</option>
                </select>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
              <a href="#themelink" class="btn btn-light">Tout Les Themes</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Domaine</h4>
            <p class="card-description"> Ajouter un domaine </p>
            <form class="forms-sample" @submit.prevent="addDomaine">
              <div class="form-group">
                <label for="domaine_name">Nom de domaine</label>
                <input type="text" class="form-control" v-model="domaines.name" id="domaine_name" name="domaine_name" placeholder="Nom de domaine">
              </div>
                <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" v-model="domaines.desc" name="desc" id="desc" placeholder="Description"></textarea>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
              <a href="#domainelink" class="btn btn-light">Tout Les Domaines</a>
            </form>
          </div>
        </div>
      </div>
  </div>
    <div class="row">
    <div class="col-md-6 grid-margin stretch-card" >
      <div class="card" id="themelink">
        <div class="card-body">
          <h4 class="card-title">Themes</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Publié le</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(theme, idx) in themes" :key="idx">
                <td>{{theme.name | truncate(20, '...')}}</td>
                <td style="font-size:12px;color:#8a8a8a">{{ theme.created_at | moment("dddd, MM Do YYYY") }}</td>
                <td>
                <button type="button" @click="fetchTheme(theme.id)" data-toggle="modal" data-target="#exampleModalCenter2" class="btn btn-inverse-info btn-rounded btn-icon">
                  <i class="mdi mdi-pencil"></i>
                </button> <button type="button"  @click="deleteTheme(theme.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                  <i class="mdi mdi-delete"></i>
                </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div></div>
      <div class="col-md-6 grid-margin stretch-card">
      <div class="card" id="domainelink">
        <div class="card-body">
          <h4 class="card-title">Domaines</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Publié le</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(d, idx) in domaines" :key="idx">
                <td>{{d.name | truncate(20, '...')}}</td>
                <td style="font-size:12px;color:#8a8a8a">{{ d.created_at | moment("MM Do YYYY") }}</td>
                <td>
                <button type="button" @click="fetchDomaine(d.id)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-inverse-info btn-rounded btn-icon">
                  <i class="mdi mdi-pencil"></i>
                </button> <button type="button" @click="deleteDomaine(d.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                  <i class="mdi mdi-delete"></i>
                </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
</div></div></div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier Domaine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <div class="form-group">
          <label >Nom du domaine</label>
          <input type="text" class="form-control" v-model="domaine_detail.name" placeholder="Nom du Domaine">
       </div> 
       <div class="form-group">
          <label >Description</label>
          <input type="text" class="form-control" v-model="domaine_detail.desc" placeholder="Description">
       </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dander" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-gradient-primary" data-dismiss="modal" @click="updateDomaine(domaine_detail.id)">Modifier</button>
      </div> 
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier Theme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <div class="form-group">
          <label >Nom du domaine</label>
          <input type="text" class="form-control" v-model="theme_detail.name" placeholder="Nom du Theme">
        </div>
        <select class="form-control"  v-model="theme_detail.domaine" >
          <option  v-for="(domaine, idx) in domaines" :key="idx" :value="domaine.id" >{{domaine.name}}</option>
        </select>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dander" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-gradient-primary" data-dismiss="modal" @click="updateTheme(theme_detail.id)" >Modifier</button>
      </div>
    </div>
  </div>
</div>




        </div>
    
       
</template>
<script>
export default {
data() {
       return {
           domaine_detail:{ name : "", desc : ""},
           theme_detail:{ name : "", domaine:""},
           domaines: {
             name : "",
             desc : ""
           },
            themes: {
             name : "",
             domaine:""
           }
       }
   },
   created() {
       this.axios
           .get(this.api_url+'/mediexperts-academy/domaines')
           .then(response => {
               this.domaines = response.data;
           });
       this.axios
      .get(this.api_url+'/mediexperts-academy/themes')
      .then(response => {
          this.themes = response.data;
      });
   },
   methods: {
      addDomaine() {
         this.axios
             .post(this.api_url+'/mediexperts-academy/domaines',{ name: this.domaines.name, desc: this.domaines.desc, })
             .then(response => {
                this.domaines.name = "";
                this.domaines.desc = "";
                 this.axios.get(this.api_url+'/mediexperts-academy/domaines')
                 .then(response => {this.domaines = response.data;});
                 this.$toastr.s("Domaine ajouté avec succès");})
                    .catch(this.$toastr.e("Entrer un domaine"))
            },
     fetchDomaine(id){
          this.axios
           .get(`${this.api_url}/mediexperts-academy/domaines/${id}`)
           .then(response => {
              this.domaine_detail = response.data;
           });
       },
     updateDomaine(id){
        this.axios.put(`${this.api_url}/mediexperts-academy/domaines/update/${id}`,{ name: this.domaine_detail.name, desc: this.domaine_detail.desc })
               .then(() => {
             this.axios
           .get(this.api_url+'/mediexperts-academy/domaines')
           .then(response => {
               this.domaines = response.data;
           });
           this.$toastr.s("Domaine modifié avec succès");
           });   },
     deleteDomaine(id){
       this.axios.delete(`${this.api_url}/mediexperts-academy/domaines/delete/${id}`)
       .then(()=>{
          this.axios
           .get(this.api_url+'/mediexperts-academy/domaines')
           .then(response => {
               this.domaines = response.data;
           })
       }) ,
       this.$toastr.s("Domaine supprimé avec succès");
     },    

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    addTheme(){
          this.axios
            .post(this.api_url+'/mediexperts-academy/themes',{ name: this.themes.name, domaine_id: this.themes.domaine, })
            .then(response => {
             this.themes.name = "";
             this.themes.domaine = "";
             this.axios.get(this.api_url+'/mediexperts-academy/themes')
             .then(response => {this.themes = response.data;});
             this.$toastr.s("Theme ajouté avec succès");})
            .catch(this.$toastr.e("Entrer un theme")) },
    fetchTheme(id){
          this.axios
           .get(`${this.api_url}/mediexperts-academy/themes/${id}`)
           .then(response => {
              this.theme_detail = response.data;
           });
       },
   updateTheme(id){
        this.axios.put(`${this.api_url}/mediexperts-academy/themes/update/${id}`,{ name: this.theme_detail.name, domaine_id: this.theme_detail.domaine })
               .then(() => {
             this.axios
           .get(this.api_url+'/mediexperts-academy/themes')
           .then(response => {
               this.themes = response.data;
           })
           this.$toastr.s("Theme modifié avec succès");
           ;})
           ;},
   deleteTheme(id){
       this.axios.delete(`${this.api_url}/mediexperts-academy/themes/delete/${id}`)
       .then(()=>{
          this.axios
           .get(this.api_url+'/mediexperts-academy/themes')
           .then(response => {
               this.themes = response.data;
           })
          
       }) ,
       this.$toastr.s("Theme supprimé avec succès");
     },      

       }

    
   }

</script>
<style >

</style>