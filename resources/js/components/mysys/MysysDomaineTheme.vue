<template>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-cards-outline"></i>
      </span> Domaine et Theme | MySys </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Aperçu <i data-toggle="tooltip" data-placement="top" title="Sur cette page tu peux ajouter et manipuler les domaines et les themes, et tout va s'afficher sur le site directement." class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
            <form class="forms-sample" @submit.prevent="addTheme()">
              <div class="form-group">
                <label for="theme_name">Couverture du theme</label>
                <input type="text" class="form-control" v-model="mysysthemes.url_img" placeholder="https://pexels.com/cloud.png..">
              </div>
              <div class="form-group">
                <label for="theme_name">Nom du theme</label>
                <input type="text" class="form-control" v-model="mysysthemes.mysysname" placeholder="Nom du theme">
              </div>
              <div class="form-group">
                <label for="desc">Description</label>
               <textarea class="form-control" id="desc" name="desc" v-model="mysysthemes.mysysdesc" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                <label for="domaine">Le domaine associé</label>
                <select class="form-control" v-model="mysysthemes.mysysdomaine" >
                        <option v-for="(domaine, idx) in domaines" :key="idx" :value="domaine.id" >{{domaine.name}}</option>
                </select>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
              <a href="#themelink2" class="btn btn-light">Tout Les Themes</a>
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
              <button type="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
              <a href="#domainelink" class="btn btn-light">Tout Les Domaines</a>
            </form>
          </div>
        </div>
      </div>
  </div>
    <div class="row">
    <div class="col-md-6 grid-margin stretch-card" >
      <div class="card" id="themelink2">
        <div class="card-body">
          <h4 class="card-title">Themes</h4>
          <paginate name="tm" :list="themes" :per="5" class="pl-0">
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Publié le</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="themes in paginated('tm')" :key="themes.id">
                <td class="font-weight-bold">{{themes.name | truncate(12, '..')}}</td>
                <td style="font-size:12px;color:#8a8a8a">{{ themes.created_at | moment("dddd, MM Do YYYY") }}</td>
                <td>
                <button type="button" @click="fetchTheme(themes.id)" data-toggle="modal" data-target="#exampleModalCenter2" class="btn btn-inverse-info btn-rounded btn-icon">
                  <i class="mdi mdi-pencil"></i>
                </button> <button type="button"  @click="deleteTheme(themes.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                  <i class="mdi mdi-delete"></i>
                </button>
                </td>
              </tr>
            </tbody>
          </table>
         </paginate>
           <paginate-links for="tm" :show-step-links="true" :step-links="{ next: 'Suivant', prev: 'Précédent' }"></paginate-links>
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
                <td class="font-weight-bold">{{d.name | truncate(15, '..')}}</td>
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
          <input type="text" class="form-control" v-model="domaine_detail.name">
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
          <label >Couverture du theme </label>
          <input type="text" class="form-control" v-model="theme_detail.url_img">
        </div>
        <div class="form-group">
          <label >Nom du theme</label>
          <input type="text" class="form-control" v-model="theme_detail.name">
        </div>
         <div class="form-group">
          <label >Description</label>
          <textarea class="form-control" v-model="theme_detail.desc"></textarea>
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
           domaine_detail:{ name : "",},
           theme_detail:{ name : "",desc:"", domaine:"",  url_img:""},
           domaines: {
             name : "",
           },
            themes: {
             name : "",
             desc : "",
             domaine:""
           },
            mysysthemes: {
             mysysname : "",
             mysysdesc : "",
             mysysdomaine:"",
             url_img:""
           },
           paginate: ['tm'],
       }
   },
   created() {
       this.axios
           .get(this.api_url+'/mysys/domaines')
           .then(response => {
               this.domaines = response.data;
           });
       this.axios
      .get(this.api_url+'/mysys/themes')
      .then(response => {
          this.themes = response.data;
      });
      console.log("url :", this.api_url);
   },

   methods: {
      addDomaine() {
         this.axios
             .post(this.api_url+'/mysys/domaines',{ name: this.domaines.name })
             .then(response => {
                this.domaines.name = "";
                 this.axios.get(this.api_url+'/mysys/domaines')
                 .then(response => {this.domaines = response.data;});
                 this.$toastr.s("Domaine ajouté avec succès");})
                    .catch(this.$toastr.w("chargement.."))
            },
     fetchDomaine(id){
          this.axios
           .get(`${this.api_url}/mysys/domaines/${id}`)
           .then(response => {
              this.domaine_detail = response.data;
           });
       },
     updateDomaine(id){
        this.axios.put(`${this.api_url}/mysys/domaines/update/${id}`,{ name: this.domaine_detail.name })
               .then(() => {
             this.axios
           .get(this.api_url+'/mysys/domaines')
           .then(response => {
               this.domaines = response.data;
           });
           this.$toastr.s("Domaine modifié avec succès");
           });   },
     deleteDomaine(id){
       this.axios.delete(`${this.api_url}/mysys/domaines/delete/${id}`)
       .then(()=>{
          this.axios
           .get(this.api_url+'/mysys/domaines')
           .then(response => {
               this.domaines = response.data;
           })
       }) ,
       this.$toastr.s("Domaine supprimé avec succès");
     },    

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    addTheme(){
          this.axios
            .post(this.api_url+'/mysys/themes',{ name: this.mysysthemes.mysysname,url_img: this.mysysthemes.url_img, desc: this.mysysthemes.mysysdesc, mysysdomain_id: this.mysysthemes.mysysdomaine })
            .then(response => {
             this.mysysthemes.mysysname = "";
             this.mysysthemes.mysysdesc = "";
             this.mysysthemes.url_img = "";
             this.mysysthemes.mysysdomaine = "";
             this.axios.get(this.api_url+'/mysys/themes')
             .then(response => {this.themes = response.data;});
             this.$toastr.s("Theme ajouté avec succès");})
            .catch(this.$toastr.w("chargement..")) },
    fetchTheme(id){
          this.axios
           .get(`${this.api_url}/mysys/themes/${id}`)
           .then(response => {
              this.theme_detail = response.data;
           });
       },
   updateTheme(id){
        this.axios.put(`${this.api_url}/mysys/themes/update/${id}`,{ name: this.theme_detail.name, url_img: this.theme_detail.url_img, desc: this.theme_detail.desc, mysysdomaine_id: this.theme_detail.domaine })
               .then(() => {
             this.axios
           .get(this.api_url+'/mysys/themes')
           .then(response => {
               this.themes = response.data;
           })
           this.$toastr.s("Theme modifié avec succès");
           ;})
           ;},
   deleteTheme(id){
       this.axios.delete(`${this.api_url}/mysys/themes/delete/${id}`)
       .then(()=>{
          this.axios
           .get(this.api_url+'/mysys/themes')
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