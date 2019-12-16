<template>
  <div>
    <div v-if="showkontaktform === true" class="card">
      <div class="card-header bg-transparent">Neue Kontakte</div>

      <div id="form" class="card-body">
        <form>
          <div class="form-row">
            <div class="form-group col-md-2 col-sm-12">
              <label for="inputAnrede">Anrede</label>
              <div class="form-group">
                <select
                  class="form-control custom-select"
                  id="inputAnrede"
                  v-model="query.anredeid"
                >
                  <option
                    v-for="anrede in anrede.anrede"
                    :key="anrede.id"
                    :value="anrede.id"
                  >{{anrede.anrede}}</option>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-12">
              <label for="inputNachname">Nachname</label>
              <input
                type="text"
                class="form-control"
                id="inputNachname"
                placeholder="Nachname"
                v-model="query.nachname"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputVorname">Vorname</label>
              <input
                type="text"
                class="form-control"
                id="inputVorname"
                placeholder="Vorname"
                v-model="query.vorname"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputPOS">Position / Funktion</label>
              <input
                type="text"
                class="form-control"
                id="inputPOS"
                placeholder="Position"
                v-model="query.pos"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputStrasse">Straße</label>
              <input
                type="text"
                class="form-control"
                id="inputStrasse"
                placeholder="Strasse"
                v-model="query.strasse"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputHandy">PLZ</label>
              <input
                type="text"
                class="form-control"
                id="inputHandy"
                placeholder="PLZ"
                v-model="query.plz"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputOrt">Ort</label>
              <input
                type="text"
                class="form-control"
                id="inputOrt"
                placeholder="Ort"
                v-model="query.ort"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 col-sm-12">
              <label for="inputAnrede">Land</label>
              <div class="form-group">
                <select class="form-control custom-select" id="inputAnrede" v-model="query.landid">
                  <option v-for="land in land.land" :key="land.id" :value="land.id">{{land.land}}</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputtel">Telefon</label>
              <input
                type="text"
                class="form-control"
                id="inputtel"
                placeholder="025386"
                v-model="query.tel"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputHandy">Handy</label>
              <input
                type="text"
                class="form-control"
                id="inputHandy"
                placeholder="01524455545"
                v-model="query.handy"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputtel1">Telefon-privat</label>
              <input
                type="text"
                class="form-control"
                id="inputtel1"
                placeholder="123458"
                v-model="query.tel_privat"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputemail">E-Mail</label>
              <input
                type="email"
                class="form-control"
                id="inputHandy"
                placeholder="info@info.de"
                v-model="query.email"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputHandy">Geburstag</label>
              <input
                type="text"
                class="form-control"
                id="inputemail"
                placeholder="datum"
                v-model="query.geb"
              />
            </div>
          </div>

          <button @click="addPost()" class="btn btn-primary" type="button">Speichern</button>
          <button @click="showkontaktform = false" class="btn btn-primary" type="button">Schliesen</button>
        </form>
      </div>
    </div>

    <div class="card mt-2">
      <div class="card-header">
        <h5>Kontakte</h5>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="showkontaktinfo=true " href="#">Kontakte Hinzufügen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click.prevent="showkontaktform=true " href="#">Neuer Kontakte</a>
          </li>
        </ul>

        <div v-if="showkontaktinfo === true" class="input-group-prepend mt-3">
          <div class="material-icons input-group-text">search</div>
          <input class="form-control" v-model=" searchQuery" />
        </div>
      </div>

      <div class="card-body">
        <table class="table table-sm tabble-striped table-inverse">
          <thead class="thead-inverse">
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Telefon</th>
              <th>Handy</th>
              <th>Telefon-privat</th>
              <th>E-Mail</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="kontakte in kontakte.kontakte" :key="kontakte.id">
              <td scope="row">{{kontakte.name + ' ' + kontakte.vorname}}</td>
              <td>{{kontakte.position}}</td>
              <td>{{kontakte.tel}}</td>
              <td>{{kontakte.handy}}</td>
              <td>{{kontakte.tel_privat}}</td>
              <td>{{kontakte.email}}</td>
              <td v-if="showkontaktinfo === true" >
                <button v-if="searchQuery.length >= 1 " type="button" class="btn btn-outline-success"
                    @click="addkontaktliste(kontakte.id)"
                    >Hinzufügen</button>
              </td>
              <td  v-else-if=" showkontaktinfo === false " > Normal butten </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Kontakte from "./Kontakte.vue";

export default {
  components: { Kontakte },

  props: {
    projektid: {
      type: Number,
      default() {
        return null;
      }
    },
    kundenid: {
      type: Number,
      default() {
        return null;
      }
    },

  },

  data: function() {
    return {
      showkontaktinfo: false,
      showkontaktform: false,
      searchQuery: "",
      land: {},
      anrede: {},

      query: {},
      name: "",
      description: "",
      output: "",
      kontakte: {}
    };
  },
  created: function() {
    this.Anredeget();
    this.Landget();
    this.createkundenid();
    this.addshow();
  },

  watch: {
    searchQuery: function(val, oldval) {
      if (this.searchQuery.length >= 1) {
        this.searchQuerypost();
      } else {
        this.addshow();
      }
    }
  },
  load: "",
  computed: {},
  methods: {
    createkundenid() {
      if (this.kundenid) {
        this.query.kundenid = this.kundenid;
      }

        this.query.projektid = this.$route.query.projekt;
     
    },
    searchQuerypost() {
      let uri;
      uri = "/api/searchQuery/kontakte";
      this.query.suchen = this.searchQuery;
      axios
        .post(uri, this.query)
        .then(response => (this.kontakte = response.data));
    },

    Anredeget() {
      axios.get("/api/anrede").then(response => (this.anrede = response.data));
    },

    Landget() {
      axios.get("/land").then(response => (this.land = response.data));
    },

    addshow() {
      let uri = "api/show/kontakte";
      axios
        .post(uri, this.query)
        .then(response => (this.kontakte = response.data));
    },

    addPost() {
      let uri = "api/store/kontakte";
      axios
        .post(uri, this.query)
        .then(response => (this.kontakte = response.data));

    },
    addkontaktliste(val) {
        this.query.kundenid = val;
      let uri = "/api/store/kontaktelist";
      axios
        .post(uri, this.query)
        .then(response => (this.kontakte = response.data));

         this.searchQuery='';
         this.showkontaktinfo=false;

    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
