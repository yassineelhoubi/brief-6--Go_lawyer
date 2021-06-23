<template>
  <div class="card">
    <div class="card-body form-group">
      <label for=""> Referenece : </label>
      <input
        type="text"
        name="Referenece"
        class="form-control mb-2"
        v-model="ref"
      />
      <button @click.prevent="login" class="btn btn-primary text-white">
        Sign In
      </button>
    </div>
  </div>
</template>

<script>
// import Appointment from '../views/Appointment.vue'
export default {
  name: "Login",
  data() {
    return {
      ref: "",
    };
  },
  methods: {
    // setuser(){

    // },
    login() {
      fetch("http://localhost/backend-brief6/controller/C-login.php", {
        method: "post",
        headers: {
          "Content-type": "application/json",
        },
        body: JSON.stringify({
          ref: this.ref,

        }),

      })
        .then((res) => res.json())
        .then((data) => {
          if ((this.ref == data.ref.ref)) {
            console.log(data.ref.ref);
            /* this.$emit('setuser',data.ref.ref) */
            localStorage.setItem('Reference', data.ref.ref );
            this.$router.push("/Appointment")
          }else{
            alert("Reference incorrect")
          }
        });
    },
  },
};
</script>

<style></style>
