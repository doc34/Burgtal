<template>
  <div>
    <div class="card-body">
      <div class="card-header bg-transparent">
        <h4>Kunden Dashboard</h4>
      </div>
      <div class="card-text"></div>
    </div>
    <div class="card w-100 bg-transparent">
      <div class="card-body">
        <div class="card-header bg-transparent">
          <div class="nav justify-content-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button
                @click="showkundenclick('0')"
                type="button"
                class="btn btn-outline-secondary"
                :class="cssavtivekunde"
              >Kunden</button>
              <button
                @click="showkundenclick('1')"
                type="button"
                class="btn btn-outline-secondary"
                :class="cssavtivelieferant"
              >Lieferant</button>
              <button type="button" class="btn btn-outline-secondary">Right</button>
            </div>
          </div>
        </div>
        <div class="card-header bg-transparent ml-4">
          <ul class="nav justify-content-center">
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="inputext"
                placeholder="Suchen"
                v-model="searchQuery"
              />
            </div>
          </ul>
        </div>

        <table v-if="kunden" class="table table-sm table-hover table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name des Partners</th>
              <th scope="col">Alias-Name</th>
              <th scope="col">Kundennummer</th>
              <th scope="col">Lieferant</th>
              <th scope="col">Stadt</th>
              <th scope="col">PLZ</th>
              <th scope="col">Telefon</th>
            </tr>
          </thead>
          <tbody v-if="kunden.kunde">
            <tr v-for="kunde in kunden.kunde.data " :key="kunde.id">
              <th scope="row">{{kunde.id}}</th>
              <td>{{kunde.name + ' ' + kunde.vorname}}</td>
              <td>{{kunde.alias}}</td>
              <td>{{kunde.kundennum}}</td>
              <td>{{kunde.lieferantnum}}</td>
              <td>{{kunde.ort}}</td>
              <td>{{kunde.plz}}</td>
              <td>{{kunde.tel}}</td>
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
      searchQuery: ' ',
      showkunden: "0" ,
      cssavtivekunde: "active",
      cssavtivelieferant: '',
    };
  },
  created: function() {
    this.searchQuerypost();
  },

  watch: {
    showkunden: function(val, oldVal) {
      if (val == 0) {
        this.cssavtivekunde = "active";
        this.cssavtivelieferant = '';
this. searchQuerypost();
      }

      if (val == 1) {
        this.cssavtivekunde = '';
        this.cssavtivelieferant = "active";
this. searchQuerypost();
      }
    },

    searchQuery: function(val, oldVal) {
this. searchQuerypost();
    },

  },

  computed: {},
  methods: {
    Kundenget() {
      axios.get("/Kunden").then(response => (this.kunden = response.data));
    },

    searchQuerypost() {
let uri
        if( this.showkunden == "0" ){
       uri = "/api/searchQuery/kunde";
        }else{
         uri = "/api/searchQuery/lieferant";
        }


      axios
        .post(uri, 'suchen='+ this.searchQuery)
        .then(response => (this.kunden = response.data));
    },
    showkundenclick: function(val) {
      this.showkunden = val;
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
