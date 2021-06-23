<template>

  <div>
    <nav class="navbar p-1 navbar-light bg-dark">
      <div class="container-fluid ">
        <div class="container p-0 m-0 ">
          <a class="me-2" href="tel:0621409091"
            ><i class="fas fa-phone-alt"></i> 0621409091</a
          >   |    
          <a href="tel:contact@law-firm.com"><i class="far fa-envelope"></i> contact@law-firm.com</a>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Go-lawyer</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse float-end" id="navbarNavAltMarkup">
          <div class="navbar-nav ">

              <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
              <router-link class="nav-link" to="/Appointment">Appointment</router-link>


          </div>
        </div>
      </div>
    </nav>
     <router-view/>
    <Footer />
  </div>
 

</template>

<script>
import Home from "./views/Home.vue";
import Footer from "./components/Footer.vue"

export default {
  name: "App",
  components: {

    Home,
    Footer,

  },
  data(){
    return{

    }
  },
  methods:{

  }
};
</script>

<style >
 * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
a {
  text-decoration: none;
  color: white;
}
</style>