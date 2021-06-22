<template>

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
              @click="handleOnclick()"
              >Sign Up</a
            >
            <a
              class="nav-link"
              :class="{ active: showLogin }"
              href="#"
              @click="handleOnclick()"
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
      showLogin: true,
    };
  },
  methods: {
    handleOnclick() {

        this.showLogin = !this.showLogin

    },

  },
};
</script>

<style>

.nav-link{
  color: #fff;
}
</style>