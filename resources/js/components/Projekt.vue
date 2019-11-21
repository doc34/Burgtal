<template>
  <div class="row">
    <div class="card-body">
      <div class="card-header bg-transparent">
        <h4>Projekt Dashboard</h4>
      </div>
      <div class="card-text"></div>
    </div>

    <div class="card w-100">
      <h5 class="card-header">Featured</h5>
      <div class="card-body">
        <table class="table table-sm table-inverse ">
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
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                <button type="button" class="btn btn-sm btn-outline-success">Aufgaben</button>
                <button type="button" class="btn btn-sm btn-outline-danger">Löschen</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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

  computed: {

  },
  methods: {

  projektget() {
      axios
        .get("/api/show/projekt")
        .then(response => (this.projekt = response.data));
    },








    formSubmit(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/formSubmit", {
          name: this.name,
          description: this.description
        })
        .then(function(response) {
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
