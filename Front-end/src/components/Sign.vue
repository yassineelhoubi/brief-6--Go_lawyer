<template>
<div>

    <header>
    <nav class="navbar navbar-expand ">
      <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">StoreRoom</a> -->
        <div class="collapse navbar-collapse">
          <div class="navbar-nav mr-auto">
            <a
              class="nav-link"
              :class="{ active: showSignup }"
              aria-current="page"
              href="#"
              @click="Onclicksignup()"
              >Sign Up</a
            >
            <a
              class="nav-link"
              :class="{ active: showLogin }"
              href="#"
              @click="OnclickLogin()"
              >Sign In</a
            >
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="mt-3">
    <Login v-if="showLogin"/>
    <Signup v-else />
    <!-- <button @click="setuser(1)">click</button> -->
  </main>
</div>

</template>

<script>
import Login from "./Login.vue";
import Signup from "./Signup.vue";
export default {
  name: "Sign",
  components: {
    Login,
    Signup,
  },
  data() {
    return {
      showLogin: false,
      showSignup: true,
    };
  },
  methods: {
    OnclickLogin() {
        this.showLogin = true
        showSignup = false 
    },
        Onclicksignup() {
        this.showLogin = false
        showSignup = true 
    },

  },
};
</script>

<style>

.nav-link{
  color: #fff;
}
</style>