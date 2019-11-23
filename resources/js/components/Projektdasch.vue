<template>
  <div class="templade">
    <div class="card">
      <div class="card-header bg-transparent">
        <h4>Projekt Dashboard</h4>
      </div>
    </div>
    <div class="row">
      <div class="card w-50">
        <div class="card-header">Übersicht</div>.
        <div class="card-columns">
          <div class="card">
            <img class="card-img-top" src alt />
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src alt />
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card w-50">
        <div class="card-header">letzte Äanderung</div>
        <table class="table table-sm table-inverse">
          <thead class="thead-inverse">
            <tr>
              <th>rrr</th>
              <th>rr</th>
              <th>rr</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">fdvcerv</td>
              <td>vfcrevfc</td>
              <td>vfcvs</td>
            </tr>
            <tr>
              <td scope="row">vsvfvc</td>
              <td>vcefvcc</td>
              <td>gfetrger</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card w-50">
        <div class="card-header">Offene Projekte nach Partner</div>
        <table class="table table-sm table-inverse">
          <thead class="thead-inverse">
            <tr>
              <th>rrr</th>
              <th>rr</th>
              <th>rr</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">fdvcerv</td>
              <td>vfcrevfc</td>
              <td>vfcvs</td>
            </tr>
            <tr>
              <td scope="row">vsvfvc</td>
              <td>vcefvcc</td>
              <td>gfetrger</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card w-50">
        <h5 class="card-header">Letzen 15 projekte</h5>
        <div class="card-body">
          <table class="table table-sm table-inverse">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Projekt</th>
                <th>Projektleiter</th>
                <th></th>
              </tr>
            </thead>
            <tbody v-if="projekt.projekt">
              <tr v-for="projekt in projekt.projekt.data" :key="projekt.id">
                <td scope="row">{{projekt.projektnummer}}</td>
                <td>{{projekt.name + ' ' + projekt.vorname}}</td>
                <td>{{projekt.projektname}}</td>
                <td>{{projekt.projektleiter}}</td>
                <td>
                  <button @click="editadd(projekt.id)" type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  <button type="button" class="btn btn-sm btn-outline-success">Aufgaben</button>
                  <button type="button" class="btn btn-sm btn-outline-danger">Löschen</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Projektnav from "./ProjektNav.vue";

export default {
  components: {
    Projektnav
  },

  data: function() {
    return {
      projekt: {},
      name: "",
      description: "",
      output: ""
    };
  },
  created: function() {
    this.projektget();
  },

  watch: {},

  computed: {},
  methods: {
    projektget() {
      axios
        .get("/api/show/projekt")
        .then(response => (this.projekt = response.data));
    },
    editadd(id) {
this.$router.push({ name: 'projekt', query: { projekt: id , page:'projekt' } })

    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

