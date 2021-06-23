<template>
  <div v-if="ref" class="appointment">
    <button class="float-end btn btn-link" @click="logout">logout</button>
    <form action="" class="container col-lg-5 mb-5">
      <center><h1>Make Appointment</h1></center>
      <div class="mb-3">
        <label for="">Date</label>
        <input :min="date_sys"
          @change="getidCreneaux()"
          v-model="date"
          type="date"
          class="form-control"
          name=""
          id=""
        />
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"
          >sujet</label
        >
        <textarea
          v-model="sujet"
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
        ></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"
          >Creneaux</label
        >
        <select 
          class="form-control"
          required
          name=""
          id=""
          v-model="idcreneaux"
        >
          <option value="" disabled selected>Select Creneaux</option>
          <option
            v-for="creneau in creneaus"
            :key="creneau.id"
            :value="creneau.id"
            >{{ creneau.creneaux }}</option
          >
        </select>
      </div>
      <button
        v-if="!btnUpdate"
        @click.prevent="newAppointment()"
        type="submit"
        class="btn btn-primary"
      >
        Submit
      </button>
      <button
        v-else
        @click.prevent="UpdateAppointment()"
        type="submit"
        class="btn btn-info"
      >
        UpdateAppointment
      </button>
    </form>
    <!-- apointments list -->
    <div class="container">
      <center><h1>Historical</h1></center>
      <table class="table table-primary table-striped">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Creneau</th>
            <th scope="col">sujet</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="A in RDV" :key="A.id">
            <th>{{ A.date }}</th>
            <td>{{ A.creneaux }}</td>
            <td>{{ A.sujet }}</td>
            <td colspan="2">
              <button
                class="btn btn-danger"
                @click="delAppointment(A.id, A.date)"
              >
                <i class="far fa-trash-alt"></i>
              </button>
              <button
                class="btn btn-warning"
                @click="editAppointment(A.id, A.date, A.sujet, A.idcreneaux)"
              >
                <i class="fas fa-edit"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- apointment LIst -->
  </div>
<div v-else class="logout">
  <center><h1>Write Your Reference First</h1><span><button class="btn btn-primary" @click="pushtoHome">Click Here</button></span></center>
</div>

</template>
<script>
import axios from "axios";

export default {
  components: {

  },
  data() {
    return {
      date: "",
      sujet: "",
      idcreneaux: "",
      ref: localStorage.getItem("Reference"),
      creneaus: {},
      RDV: [],
      idRDV: "",
      btnUpdate:false,
      date_sys : new Date().toISOString().slice(0,10)

    };
  },
  methods: {

    getidCreneaux() {
      console.log(this.date);
      let obj = {
        date: this.date,
      };
      axios
        .post(
          "http://localhost/backend-brief6/controller/C-getCreneaux.php",
          obj
        )
        .then((res) => {
          this.creneaus = res.data;
          console.log(this.creneaus);
        });
    },

    newAppointment() {
      if(this.date_sys > this.date)
        {
          alert("Impossible to Add this Appointment Because the Date is Expired.")
        }
        else
        {
      let obj = {
        ref: this.ref,
        sujet: this.sujet,
        date: this.date,
        ref: this.ref,
        idcreneaux: this.idcreneaux,
      };
      axios
        .post(
          "http://localhost/backend-brief6/controller/C-newAppointment.php",
          obj
        )
        .then((res) => {
          this.getAppointment();
          this.getidCreneaux();

          console.log(res.data);
          alert(res.data)
        });
        }
    },

    getAppointment() {
      let obj = {
        ref: this.ref,
      };
      axios
        .post(
          "http://localhost/backend-brief6/controller/C-getAppointment.php",
          obj
        )
        .then((res) => {
          this.RDV = res.data;
          console.log(this.RDV);
        });
    },

    delAppointment(id,date) {

        if(this.date_sys > date)
        {
          alert("Impossible to delete this Appointment Because the Date is Expired.")
        }
        else
        {
          
      let obj = {
        id: id,
      }
      axios
        .post(
          "http://localhost/backend-brief6/controller/C-deleteAppointment.php",
          obj
        )
        .then((res) => {
          this.getAppointment();
          console.log(res.data);
        })
        }
    },

    editAppointment(id, date, sujet, idcreneaux) {
        if(this.date_sys > date)
        {
          alert("Impossible to Update this Appointment Because the Date is Expired.")
        }
        else
        {
      (this.idRDV = id),
        (this.sujet = sujet),
        (this.date = date),

        (this.idcreneaux = idcreneaux),
        this.btnUpdate = true,

        getidCreneaux()
        }
    },

    UpdateAppointment() {
 
      let obj = {
        id: this.idRDV,
        sujet: this.sujet,
        date: this.date,
        idcreneaux: this.idcreneaux,
      };
      axios
        .post(
          "http://localhost/backend-brief6/controller/C-updateAppointment.php",
          obj
        )
        .then((res) => {
          this.getAppointment();
          console.log(res.data);
        });
    },
    logout(){
      localStorage.clear()
      this.$router.push("/")
    },

    pushtoHome(){
      this.$router.push("/")
    }
  },
    mounted() {
      this.getAppointment();
      this.getidCreneaux();

    }
};
</script>
<style scoped>
.logout{
  padding: 242px 0;
}
</style>
