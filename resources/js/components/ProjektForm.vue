<template>
  <div class="templade">
    <div class="cad border">
      <div class="card-header bg-transparent"></div>
      <div class="card-body">
        <div class="cadr-titel">
          <div class="form-row">
            <h4 v-if="name">{{name + ' ' + vorname }}</h4>
            <h4 v-else>Neuer Kontakt / Projekt</h4>
            <h4 v-if="projekt.projekt" class="ml-3">{{'Projekt '+ projekt.projekt.projektnummer }}</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form @submit.prevent="updatePost">
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
              <div v-if="edit < 1 " class="form-group col-md-4 col-sm-12">
                <ul class="nav">
                  <li class="nav-item">
                    <router-link to="/kundencrate">
                      <a class="nav-link mt-4" href="#">+ Kunden</a>
                    </router-link>
                  </li>
                </ul>
              </div>
              <div v-if="name" class="form-group col-md-4 col-sm-12">
                <label for="inputprojekt">Projektname</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputprojekt"
                  placeholder="Name"
                  v-model="update.projektname"
                />
              </div>
              <div v-if="name" class="form-group col-md-4 col-sm-12">
                <label for="inputprojekt">Projektleiter</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputprojekt"
                  placeholder="Name"
                  v-model="update.projektleiter"
                />
              </div>
            </div>

            <div v-if="name" class="form-row">
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputadresse">Beschreibung</label>
                <textarea
                  projekt.bschreibung
                  class="form-control"
                  id="inputadresse"
                  placeholder="Adresse"
                  aria-label="With textarea"
                  v-model="update.beschreibung"
                ></textarea>
              </div>
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputinfo">Info über Projekt</label>
                <textarea
                  projekt.info
                  class="form-control"
                  id="inputinfo"
                  placeholder="Adresse"
                  aria-label="With textarea"
                  v-model="update.info"
                ></textarea>
              </div>
            </div>
          </div>

          <button v-if="name" class="btn btn-primary" type="submit">weiter</button>
        </form>
      </div>
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
import moment from "moment";
export default {
  components: {},

  data: function() {
    return {
      date: "",
      data: {},
      kundennum: '',
      kunden: {},
      query: {},
      update: {},
      projekt: {},
      searchQuery: "",
      edit: "",
      update: {},
      name: "",
      showtable: false,
      test: ""
    };
  },
  created: function() {
    this.adddate();
  },

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

  computed: {},
  methods: {
    formattedDate(val) {
      return moment(val).format("YYYY-MM-DD");
    },

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
    },
    updatePost() {
      let uri = "/api/update/projekt";
      this.update.id = this.projekt.projekt.id;
      axios
        .post(uri, this.update)
        .then(response => (this.data = response.data));
      this.$router.push({
        name: "projekt",
        query: {
          projekt: this.projekt.projekt.id
        }
      });
    },

    adddate: function(params) {
      const time = new Date();
      this.date = this.formattedDate(time);
      this.routget();
    },
    routget: function() {
      if (this.$router.params) {
        this.kundennum = this.$router.params.kundennum;
      } else {
        this.kundennum = "hallo";
      }

      this.kundennum = "hal";
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
