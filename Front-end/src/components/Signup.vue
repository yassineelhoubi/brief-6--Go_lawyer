<template>
  <div class="card">
    <div class="card-body form-group">
      <label for="Reference">First Name :</label>
      <input
        type="text"

        class="form-control form-control-lg"
        placeholder="First name"
        v-model="Fname"
      />
      <label for="Reference">Date Birth :</label>
      <input
        type="date"

        class="form-control form-control-lg"
        placeholder="Date Birth"
        v-model="dateBirth"
      />
      <label for="Reference">Email :</label>
      <input
        type="email"

        class="form-control form-control-lg"
        placeholder="Email"
        v-model="email"
      />
      <label for="Reference">CNIE :</label>
      <input
        type="text"

        class="form-control form-control-lg"
        placeholder="CNIE"
        v-model="cnie"
      />
      <label for="Reference">Profession :</label>
      <input
        type="text"

        class="form-control form-control-lg"
        placeholder="Profession"
        v-model="profession"
      />
      <label for="Reference">Password :</label>
      <input
        type="password"

        class="form-control form-control-lg"
        placeholder="Password"
        v-model="password"
      />
      <button class="btn btn-primary mt-2 text-white" @click.prevent="signup">
        S'enregistrer
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Fname: "",
      Lname: "",
      dateBirth: "",
      email: "",
      cnie: "",
      profession: "",
      password: "",
    };
  },
  methods: {
    signup() {
      fetch("http://localhost/backend-brief6/controller/C-signup.php", {
        method: "post",
        headers: {
          "Content-type": "application/json",
        },
        body: JSON.stringify({
          Fname: this.Fname,
          Lname: this.Lname,
          dateBirth: this.dateBirth,
          email: this.email,
          cnie: this.cnie,
          profession: this.profession,
          password: this.password,
        }),
      })
        .then((res) => res.json())
        .then((data) => alert(data));
        
    },
  },
};
</script>

<style></style>
