<template>
  <div class="row">


    <div class="card-body">
        <form @submit.prevent="updatePost">
      <div class="card-header bg-transparent ml-4">
        <div class="form-row">
          <h4 v-if="name">{{name + ' ' + vorname }}</h4>
          <h4 v-else>Neuer Kontakt / Projekt</h4>
          <h4 v-if="projekt.projekt" class="ml-3">{{'Projekt '+ projekt.projekt.projektnummer }}</h4>
        </div>
      </div>

      <div class="card-text">
        <div class="form-row">
          <div class="form-group col-md-4 col-sm-12">
            <label for="inputKunde">Geschäftspartner</label>
            <input
              v-if="name"
              type="text"
              :value="name"
              class="form-control"
              id="inputKunde"
              disabled

            />
            <input
              v-else
              v-model="searchQuery"
              type="text"
              class="form-control"
              id="inputKunde"
              placeholder="Name"
            />
          </div>

          <div class="form-group col-md-4 col-sm-12">
            <label for="inputprojekt">Projektname</label>
            <input type="text" class="form-control" id="inputprojekt" placeholder="Name" v-model="update.projektname" />
          </div>
          <div class="form-group col-md-4 col-sm-12">
            <label for="inputprojekt">Projektleiter</label>
            <input type="text" class="form-control" id="inputprojekt" placeholder="Name" v-model="update.projektleiter" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4 col-sm-12">
            <label for="inputadresse">Beschreibung</label>
            <textarea
            projekt.bschreibung
              class="form-control"
              id="inputadresse"
              placeholder="Adresse"
              aria-label="With textarea"
            ></textarea>
          </div>
          <div class="form-group col-md-4 col-sm-12">
            <label for="inputstart">Start Datum</label>
            <input type="date" class="form-control" id="inputstart" placeholder="Name" />
          </div>
        </div>
      </div>
<button class="btn btn-primary" type="submit">weiter</button>

</form>

    </div>

    <!-- tabele card -->
    <div v-if="showtable===true" class="card w-100">
      <div class="card-body">
        <h5 class="card-title">Kunde suchen</h5>

        <table v-if="kunden.kunde" class="table table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Ort</th>
              <th scope="col">Alias</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="kunde in kunden.kunde.data" :key="kunde.id">
              <th scope="row">{{kunde.id}}</th>
              <td>{{kunde.name + ' '+kunde.vorname}}</td>
              <td>{{kunde.plz + ' ' + kunde.ort}}</td>
              <td>{{kunde.kundennum}}</td>
              <td>
                <button @click=" edit=(kunde.id)" type="button" class="btn btn-outline-success">Edit</button>
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
      kunden: {},
      query: {},
      update:{},
      projekt: {},
      searchQuery: "",
      edit: "",
      name: "",
      showtable: false
    };
  },
  created: function() {},

  watch: {
    searchQuery: function(val, oldVal) {
      this.searchQuerypost();
      this.showtable = true;
    },
    edit: function(val, oldVal) {
      this.editkunde();
      this.storeprojekt();
      this.showtable = false;
    }
  },

  computed: {

  },
  methods: {
    searchQuerypost() {
      let uri = "/api/searchQuery/kunde";

      axios
        .post(uri, "suchen=" + this.searchQuery)
        .then(response => (this.kunden = response.data));
    },
    editkunde() {
      this.kunden.kunde.data.forEach((value, index) => {
        if (value.id == this.edit) {
        }
        this.name = value.name;
        this.vorname = value.vorname;
      });
    },
    storeprojekt() {
      let uri = "/api/store/projekt";

      axios
        .post(uri, "edit=" + this.edit)
        .then(response => (this.projekt = response.data));
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
