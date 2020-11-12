<template>
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row" id="proBanner">
            <div class="col-12">
              <span class="d-flex align-items-center purchase-popup">
                <p>Bienvenue sur le tableau de bord M Globale.</p>
                <router-link :to="'/mysys/formation'" class="btn download-button purchase-button ml-auto">Accéder aux Formations - MySYS</router-link>
                <i class="mdi mdi-close" id="bannerClose"></i>
              </span>
            </div>
          </div>
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi mdi-view-dashboard"></i>
              </span> Tableau De Bord </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Aperçu <i  data-toggle="tooltip" data-placement="top" title="Tu peux apercevoir tout les statistiques des sites web ici" class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" draggable="false" />
                  <h4 class="mb-3 font-weight-bold">Formations - M Academy<i class="mdi mdi-school mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{countformation}} <span style="font-size: 12px" >formations</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" draggable="false"/>
                  <h4 class="mb-3 font-weight-bold">Formations - MySYS<i class="mdi mdi-school mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{countmysysformation}} <span style="font-size: 12px" >formations</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" draggable="false"/>
                  <h4 class="mb-3 font-weight-bold">Participants - M Academy<i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{countparticipant}} <span style="font-size: 12px" >participants</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" draggable="false"/>
                  <h4 class="mb-3 font-weight-bold">Participants - MySYS<i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{countmysysparticipant}} <span style="font-size: 12px" >participants</span></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left"><i class="mdi mdi-account-multiple-outline"></i> Nouveaux Participants - MySYS</h4>
                    <router-link :to="'/mysys/participant'" class="float-right text-primary">voir plus</router-link>
                    <div class="card-text">
                    <div class="row w-100">
                      <div class="col text-center" v-for="(partparday,ix) in participantsparday" :key="ix"> 
                       <h1 class="text-primary display1 font-weight-bold">{{partparday.count}}</h1>
                       <p class="text-muted">{{partparday.date}}</p>
                      </div>
                    </div>
                      <table class="table" >
                      <thead>
                        <tr>
                          <th style="font-size:12px;">Nom & Prenom</th>
                          <th style="font-size:12px;">E-Mail</th>
                          <th style="font-size:12px;">Telephone</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(mysyspar,idx) in newmysysparticipants" :key="idx">
                          <td class="font-weight-bold" style="font-size:13px;">{{mysyspar.nom}} {{mysyspar.prenom}}</td>
                          <td style="font-size:13px;">{{mysyspar.email}}</td>
                          <td style="font-size:13px;">{{mysyspar.phone}}</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title float-left"><i class="mdi mdi-message-text-outline"></i> Nouvaux Messages - MySYS</h1>
                  <router-link :to="'/mysys/message'" class="float-right text-primary"><i class="mdi mdi-arrow-right mdi-24px"></i></router-link>
                  <div class="card-text">
                   <table class="table">
                      <thead>
                        <tr>
                          <th style="font-size:12px;">Nom & Prenom</th>
                          <th style="font-size:12px;">Message</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(mysysms,idx) in newmysysmsg" :key="idx">
                          <td class="font-weight-bold" style="font-size:13px;">{{mysysms.name}}</td>
                          <td style="font-size:13px;">{{mysysms.message | truncate(25, '..')}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
          participantsparday:[{
            count:"",
            date:""
          }],
          countformation: "",
          countmysysformation: "",
          countparticipant: "",
          countmysysparticipant: "",
          newparticipants: {},
          newmysysparticipants: {},
          newmsg: {},
          newmysysmsg: {}
       }
   },
   mounted () {
       $(document).ready(function() {
           $("body").tooltip({ selector: '[data-toggle=tooltip]' });
       });
   },
   created() {
     this.axios
           .get(this.api_url+'/mysys/parperday')
           .then(response => {
               this.participantsparday = response.data;
           });
      this.axios
           .get(this.api_url+'/mediexperts-academy/formationscount')
           .then(response => {
               this.countformation = response.data;
           });
       this.axios
      .get(this.api_url+'/mysys/formationscount')
      .then(response => {
          this.countmysysformation = response.data;
      });
       this.axios
      .get(this.api_url+'/mediexperts-academy/participantscount')
      .then(response => {
          this.countparticipant = response.data;
      });
       this.axios
      .get(this.api_url+'/mysys/participantscount')
      .then(response => {
          this.countmysysparticipant = response.data;
      });
      this.axios
      .get(this.api_url+'/mediexperts-academy/newpar')
      .then(response => {
          this.newparticipants = response.data;
      });
      this.axios
      .get(this.api_url+'/mysys/newpar')
      .then(response => {
          this.newmysysparticipants = response.data;
      });
       this.axios
      .get(this.api_url+'/mediexperts-academy/newmsg')
      .then(response => {
          this.newmsg = response.data;
      });
      this.axios
      .get(this.api_url+'/mysys/newmsg')
      .then(response => {
          this.newmysysmsg = response.data;
      });
   },
}
</script>
<style>

</style>