@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="ml-5 ml-lg-0 pl-lg-0 pl-5 brand-logo" href="/"><img src="./images/dashboard/logo.png" width="150px" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="./images/dashboard/mini_logo.png" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right ">
          <li class="nav-item nav-profile dropdown show d-none d-md-block">
            <a href="/" target="_blank" class="btn btn-sm btn-inverse-primary">Aller sur Mediexperts Academy <i class="mdi mdi-arrow-right"></i></a>
            <a href="/" target="_blank" class="btn btn-sm btn-inverse-info">Aller sur MySYS <i class="mdi mdi-arrow-right"></i></a>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link m-0" >
            <a class="nav-link" style="cursor: pointer !important">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block ml-0">
            <a class="nav-link" href="{{ url('/logout') }}">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile" >
            <a href="#" class="nav-link" style="cursor:default !important;">
              <div class="nav-profile-image">
                <img src="./images/dashboard/user.png" alt="profile" draggable="false">
                <span class="login-status online"></span>
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2 text-capitalize">{{ Auth::user()->name }}</span>
                <span class="text-secondary text-small">Admin</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <router-link :to="'/'" class="nav-link" >
              <span class="menu-title">Tableau De Bord</span>
              <i class="mdi mdi-view-dashboard menu-icon"></i>
            </router-link>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Mediexperts Academy</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-school menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <router-link :to="'/macademy/domaine-theme'" class="nav-link" >Domaine | Theme</router-link></li>
                <li class="nav-item"> <router-link :to="'/macademy/formation'" class="nav-link" >Formations</router-link></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <span class="menu-title">MySYS</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-school menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <router-link :to="'/mysys/domaine-theme'" class="nav-link" >Domaine | Theme</router-link></li>
                <li class="nav-item"> <router-link :to="'/mysys/formation'" class="nav-link" >Formations</router-link></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
              <span class="menu-title">Participants</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <router-link :to="'/macademy/participant'" class="nav-link" >Medyexperts Academy</router-link></li>
                <li class="nav-item"> <router-link :to="'/mysys/participant'" class="nav-link">MySYS</router-link></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
              <span class="menu-title">Messages</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-message-text-outline menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <router-link :to="'/macademy/message'" class="nav-link">Mediexperts Academy</router-link></li>
                <li class="nav-item"> <router-link :to="'/mysys/message'" class="nav-link">MySYS</router-link></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <router-view></router-view>
   
     
@endsection
