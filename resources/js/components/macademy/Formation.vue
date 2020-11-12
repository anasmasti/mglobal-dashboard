<template>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-school"></i>
        </span> Formations  | Mediexperts Academy </h3>
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
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Formation</h4>
          <form class="form-sample" @submit.prevent="addFormation()">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Couverture du formation</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="formations.url_img" class="form-control" placeholder="https://image.com/angular.png">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nom du formation</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" v-model="formations.name" class="form-control" placeholder="Angular..">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Professeur</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="formations.professeur" name="professeur" id="professeur" class="form-control" placeholder="Nom du professeur">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Theme</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="formations.theme" name="theme_id" id="theme_id">
                      <option v-for="(theme, idx) in themes" :key="idx" :value="theme.id">{{theme.name}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Duration</label>
                  <div class="col-sm-9">
                    <input class="form-control" v-model="formations.duration" name="duration" id="duration" placeholder="2h..">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Categorie</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="formations.category" name="category" id="category">
                      <option>Technologie</option>
                      <option>Développement Web</option>
                      <option>Développement Mobile</option>
                      <option>Cloud</option>
                      <option>Base de données</option>
                      <option>Big Data</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Objectif</label>
                <div class="col-sm-9">
                    <input class="form-control" v-model="formations.objectif" name="objectif" id="objectif" placeholder="Objectif">
                  </div>
                </div>
              </div>
            </div>
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="formations.description" name="description" id="description"  placeholder="Description"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Prérequis</label>
                  <div class="col-sm-9">
                    <textarea  class="form-control" v-model="formations.prerequisite" id="prerequisite" name="prerequisite" placeholder="Prérequis"> </textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Programme</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="formations.programme" name="programme" id="programme" placeholder="Programme"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Avantage</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations.avantage" name="avantage" id="avantage" placeholder="Avantage">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Prix</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations.prix" name="prix" id="prix" placeholder="4000 MAD">
                  </div>
                </div>
              </div>
             <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Prix Original</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations.prix_off" name="prix_off" id="prix_off" placeholder="5000 MAD">
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Ajouter</button>
            <a href="#formationlink" class="btn btn-light">Voir tout les formations</a>
          </form>
        </div>
      </div></div>
  
   <div class="col-lg-12 grid-margin stretch-card mt-5">
      <div class="card" id="formationlink">
        <div class="card-body">
          <h4 class="card-title">Formations</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Nom du formation</th>
                <th>Categorie</th>
                <th>Professeur</th>
                <th>Publiée le</th>
                <th></th>
              </tr>
            </thead>
            <tbody >
              <tr v-for="(formation,idx) in formations" :key="idx">
                <td>{{formation.name}}</td>
                <td>{{formation.category}}</td>
                <td>{{formation.professeur}}</td>
                <td>{{formation.created_at | moment("dddd, MM Do YYYY")}}</td>
                <td>
                <button type="button" @click="fetchFormation(formation.id)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-inverse-info btn-rounded btn-icon">
                  <i class="mdi mdi-pencil"></i>
                </button><button type="button" @click="deleteFormation(formation.id)" class="btn btn-inverse-danger btn-rounded btn-icon">
                  <i class="mdi mdi-delete"></i>
                </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
              </div>
    </div>
   
 <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content px-3 ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier Theme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body ">
         <div class="row">
           <div class="col-md-6">
             <div class="form-group row">
               <label class="col-sm-3 col-form-label labelsizeformodel" >Couverture du formation</label>
               <div class="col-sm-9">
                 <input type="text" v-model="formations_detail.url_img" class="form-control" >
               </div>
             </div>
           </div>
         </div>
       <div class="row">
          <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel" >Nom du formation</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="formations_detail.name" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Professeur</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="formations_detail.professeur"  class="form-control" >
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Theme</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="formations_detail.theme" >
                      <option v-for="(theme, idx) in themes" :key="idx" :value="theme.id">{{theme.name}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Duration</label>
                  <div class="col-sm-9">
                    <input class="form-control" v-model="formations_detail.duration">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Categorie</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="formations_detail.category" >
                      <option>Technologie</option>
                      <option>Développement Web</option>
                      <option>Développement Mobile</option>
                      <option>Cloud</option>
                      <option>Base de données</option>
                      <option>Big Data</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Objectif</label>
                <div class="col-sm-9">
                    <input class="form-control" v-model="formations_detail.objectif">
                  </div>
                </div>
              </div>
            </div>
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="formations_detail.description"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Prérequis</label>
                  <div class="col-sm-9">
                    <textarea  class="form-control" v-model="formations_detail.prerequisite"> </textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Programme</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="formations_detail.programme"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Avantage</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations_detail.avantage">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Prix</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations_detail.prix">
                  </div>
                </div>
              </div>
             <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label labelsizeformodel">Prix Original</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="formations_detail.prix_off">
                  </div>
                </div>
              </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dander" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-gradient-primary" data-dismiss="modal" @click="updateFormation(formations_detail.id)" >Modifier</button>
      </div>
    </div>
  </div>
</div>  </div>
    
    </div>
    
</template>

<script>
export default {
  data() {
       return {
         formations_detail:{
          name : "",
          url_img: "",
          description:"",
          programme:"",
          professeur:"",
          prerequisite:"",
          category:"",
          duration:"",
          objectif:"",
          avantage:"",
          prix:"",
          prix_off:"",
          theme:"",},

         formations: {
          name : "",
          url_img: "",
          description:"",
          programme:"",
          professeur:"",
          prerequisite:"",
          category:"",
          duration:"",
          objectif:"",
          avantage:"",
          prix:"",
          prix_off:"",
          theme:"",},

         themes: {}
       }
   },
   created() {
       this.axios
           .get(this.api_url+'/mediexperts-academy/formations')
           .then(response => {
               this.formations = response.data;
           });
       this.axios
      .get(this.api_url+'/mediexperts-academy/themes')
      .then(response => {
          this.themes = response.data;
      });
   },
   methods: {
    addFormation() {
      this.axios.post(this.api_url+'/mediexperts-academy/formations',{ 
          name: this.formations.name,
          url_img: this.formations.url_img,
          description:this.formations.description,
          programme:this.formations.programme,
          professeur:this.formations.professeur,
          prerequisite:this.formations.prerequisite,
          category:this.formations.category,
          duration:this.formations.duration,
          objectif:this.formations.objectif,
          avantage:this.formations.avantage,
          prix:this.formations.prix,
          prix_off:this.formations.prix_off,
          theme_id:this.formations.theme, })
          .then(response => {
             this.formations.name = "";
             this.formations.url_img = "";
             this.formations.description = "";
             this.formations.programme = "";
             this.formations.professeur = "";
             this.formations.prerequisite = "";
             this.formations.category = "";
             this.formations.duration = "";
             this.formations.objectif = "";
             this.formations.avantage = "";
             this.formations.prix = "";
             this.formations.prix_off = "";
             this.formations.theme = "";
              this.axios.get(this.api_url+'/mediexperts-academy/formations')
              .then(response => {this.formations = response.data;});
              this.$toastr.s("Formation ajouté avec succès");})
                 .catch(this.$toastr.e("Entrer un domaine"))
            },
    deleteFormation(id){
       this.axios.delete(`${this.api_url}/mediexperts-academy/formations/delete/${id}`)
       .then(()=>{
          this.axios
           .get(this.api_url+'/mediexperts-academy/formations')
           .then(response => {
               this.formations = response.data;
           })
          
       }) ,
       this.$toastr.s("Theme supprimé avec succès");
     },    
   updateFormation(id){
   this.axios.put(`${this.api_url}/mediexperts-academy/formations/update/${id}`,{ 
     name: this.formations_detail.name,
     url_img: this.formations_detail.url_img,
     description:this.formations_detail.description,
     programme:this.formations_detail.programme,
     professeur:this.formations_detail.professeur,
     prerequisite:this.formations_detail.prerequisite,
     category:this.formations_detail.category,
     duration:this.formations_detail.duration,
     objectif:this.formations_detail.objectif,
     avantage:this.formations_detail.avantage,
     prix:this.formations_detail.prix,
     prix_off:this.formations_detail.prix_off,
     theme_id:this.formations_detail.theme,
    })
     .then(() => {
        this.axios.get(this.api_url+'/mediexperts-academy/formations')
        .then(response => {
          this.formations = response.data;
      })
      this.$toastr.s("Theme modifié avec succès");
      ;});}, 
   fetchFormation(id){
          this.axios
           .get(`${this.api_url}/mediexperts-academy/formations/${id}`)
           .then(response => {
              this.formations_detail = response.data;
           });
       },    
            
 }
}
</script>
<style>
  .labelsizeformodel{
    font-size: 12px !important;
  }
</style>