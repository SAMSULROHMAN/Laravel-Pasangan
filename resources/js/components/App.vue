<template>
    <div>
        <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
            <a href="#" class="navbar-brand">Manajemen Pegawai</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="sidebar">
                    <ul class="navbar-nav d-sm-none">
                        <li class="nav-item">
                            <router-link class="nav-link text-white" :to="{name:'home'}">
                                <i class="oi oi-dashboard"></i> Dashboard
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-white" :to="{name:'pegawai'}">
                                <i class="oi oi-person"></i> Pegawai
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-white" :to="{name:'jabatan'}">
                                <i class="oi oi-sort-descending"></i> Jabatan
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="oi oi-account-logout"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <nav class="col-md-2 col-sm-3 bg-dark h-100 p-0 position-fixed d-none d-sm-block">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark">
                            <router-link class="nav-link text-white" :to="{name: 'home' }">
                                <i class="oi oi-dashboard"></i>Dashboard
                            </router-link>
                        </li>
                        <li class="list-group-item bg-dark">
                            <router-link class="nav-link text-white" :to="{name: 'pegawai' }">
                                <i class="oi oi-person"></i>Pegawai
                            </router-link>
                        </li>
                        <li class="list-group-item bg-dark">
                            <router-link class="nav-link text-white" :to="{name: 'jabatan' }">
                                <i class="oi oi-sort-descending"></i>Jabatan
                            </router-link>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="#" class="nav-link text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="oi oi-account-logout"></i>Logout
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-3">
                    <form action="/logout" method="POST" id="logout-form" style="display: none;">
                        <input type="hidden" name="token" v-bind:value="csrf_token">
                    </form>

                    <section>
                        <transition name="fade">
                            <router-view></router-view>
                        </transition>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.fade-enter-active {
  transition: opacity 1s;
}
.fade-enter {
  opacity: 0;
}
</style>
<script>
export default {
  data() {
    return {
      csrf_token: window.Laravel.csrfToken
    }
  }
}
</script>