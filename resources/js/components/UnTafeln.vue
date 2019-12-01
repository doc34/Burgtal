<template>
  <div>
    <div class="card">
      <div class="card-body">
        <!-- form -->
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="Lieferant">Lieferant</label>
            <span v-if="lieferant.kunde" class="badge badge-secondary">{{lieferant.kunde.total}}</span>
            <input class="form-control" type="text" id="Lieferant" v-model="searchQuery" />
          </div>
          <div class="col-md-4 mb-3">
            <label for="Material">Material</label>
            <span v-if="material.material" class="badge badge-secondary">{{material.material.total}}</span>
            <div class="input-group-prepend">
              <input
                v-model="searchQuerym"
                type="text"
                class="form-control"
                id="Material"
                aria-describedby="helpId"
                placeholder
              />
              <input
                v-if="starkname != false"
                type="text"
                aria-label="Last name"
                :value="starkname | bemassung"
                class="form-control"
              />
              <input
                v-if="artname != false"
                type="text"
                aria-label="Last name"
                :value="artname"
                class="form-control"
              />
            </div>
          </div>
        </div>
        <div v-if="kundenid === true">
          <div v-if="lieferant.kunde" class="col-md-4 mb-3">
            <label for="inputLieferant">Lieferant</label>
            <select multiple class="custom-select" id="inputLieferant">
              <option
                v-for="kunden in lieferant.kunde.data"
                :key="kunden.id"
                :value="kunden.id"
                @click.prevent="kundennummer(kunden.id , kunden.name,kunden.alias )"
              >{{kunden.name+ ' '+ kunden.alias }}</option>
            </select>
          </div>
        </div>
        <div v-if="showmaterial=== true">
          <div v-if="material.material" class="form-row">
            <div class="col-md-4 mb-3">
              <label for="inputLieferant">Material</label>

              <select multiple class="custom-select" id="inputLieferant">
                <option
                  v-for="material in material.material.data"
                  :key="material.id"
                  @click.prevent="materialnummer(material.id , material.material)"
                >{{material.material}}</option>
              </select>
            </div>
          </div>
        </div>
        <div v-if="materialid" class="form">
          <div v-if="showstark === true " class="col-md-4 mb-3">
            <label for="inputLieferant">Stark</label>
            <select multiple class="custom-select" name id="inputLieferant">
              <option
                v-for="stark in stark.stark"
                :key="stark.id"
                :value="stark.id "
                @click.prevent="starknummer(stark.id , stark.stark)"
              >{{stark.stark | bemassung}}</option>
            </select>
          </div>
        </div>
        <div v-if="starkid" class="form">
          <div v-if="showart === true" class="col-md-4 mb-3">
            <label for="inputLieferant">Art</label>
            <select multiple class="custom-select" name id="inputLieferant">
              <option
                v-for="art in art.art"
                :key="art.id"
                :value="art.id"
                @click.prevent="artnummer(art.id , art.art)"
              >{{art.art}}</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- form masse -->
    <div class="card">
      <div class="card-body">
        <form class="form-group">
          <div class="form-row">
            <button
              @click.prevent="Blocknummer()"
              type="button"
              class="btn btn-sm btn-outline-dark mt-4 mb-3"
            >Neue</button>
            <div class="form-group col-md-2">
              <label for="inputblock">Block</label>
              <input
                type="text"
                class="form-control"
                id="inputblock"
                placeholder="Blocknummer"
                :value="block"
              />
            </div>
            <div class="col-md-2">
              <label for="inputmateriallist">Materialliste</label>
              <select
                class="custom-select"
                name
                id="inputmateriallist"
                v-model="query.materiallistid"
              >
                <option
                  v-for="materiallist in materialist.materiallist"
                  :key="materiallist.id"
                  :value="materiallist.id"
                >{{materiallist.materal_list_name}}</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="inputSteuck">Stück</label>
              <input
                type="text"
                class="form-control"
                id="inputSteuck"
                placeholder="Stück"
                v-model="query.stuek"
              />
            </div>

            <div class="form-group col-md-2">
              <label for="inputLeange">Länge</label>
              <input
                type="text"
                class="form-control"
                id="inputLeange"
                placeholder="Länge"
                v-model="query.leange"
              />
            </div>

            <div class="form-group col-md-2">
              <label for="inputbreite">Breite</label>
              <input
                type="text"
                class="form-control"
                id="inputbreite"
                placeholder="Breite"
                v-model="query.breite"
              />
            </div>
            <div class="form-group col-md-1 mt-2">
              <label></label>
              <button
                @click="addstore()"
                class="form-control btn btn-primary"
                type="button"
              >Speichern</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- tabele material -->
    <div class="card table">
      <form id="search">
        Search
        <input name="query" v-model="searchQuery" />
      </form>
      <div class="card-body">
        <table class="table table-striped table-inverse">
          <thead class="thead-inverse">
            <tr>
              <th>Block</th>
              <th>Material</th>
              <th>ist qm</th>
              <th>verbraucht qm</th>
              <th>Start qm</th>
            </tr>
          </thead>
          <tbody v-if="materialblock.block">
            <tr v-for="block in materialblock.block" :key="block.id">
              <td scope="row">{{block.block}}</td>
              <td>
                {{
                block.material+ ' '+block.stark +' '+block.art}}
              </td>
              <td>{{block.r_qm}}</td>
              <td>{{block.v_qm}}</td>
              <td>{{block.s_qm}}</td>
              <td>{{block.created_at |formattedDate}}</td>
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
  props: {},

  data: function() {
    return {
      showlieferant: true,
      showmaterial: true,
      showart: true,
      showstark: true,
      searchQuery: "",
      searchQuerym: "",
      kundenid: true,
      materialid: "",
      artid: "",
      artname: false,
      starkid: "",
      starkname: false,
      lieferant: {},
      material: {},
      materialist: {},
      query: {},
      stark: {},
      art: {},
      block: "",
      test: {},
      materialblock: {}
    };
  },
  created: function() {
    this.Art();
    this.Stark();
    this.materiallist();
    this.getmaterial();
  },

  watch: {
    searchQuery: function(val, oldval) {
      if (this.kundenid == true) {
        this.lieferantenpost();
      }
    },
    searchQuerym: function(val, oldval) {
      if (val != "") {
        this.searchQuerypost();
      }
      if (val == "") {
        this.showmaterial = true;
        this.showstark = true;
        this.showart = true;
        this.starkid=false;
        this.materialid=false;
        this.artid=false;
      }
    },
    block: function(val, oldval) {
      this.query.bolck = val;
    },
    kundenid: function(val, oldval) {
      this.query.kundenid = val;
    },
    materialid: function(val, oldval) {
      this.query.materialid = val;
    },
    starkid: function(val, oldval) {
      this.query.starkid = val;
    },
    artid: function(val, oldval) {
      this.query.artid = val;
    }
  },

  computed: {},
  methods: {
    addstore() {
      this.query.leange = this.query.leange.replace(",", ".");
      this.query.breite = this.query.breite.replace(",", ".");

      this.query.sqm = this.query.leange * this.query.breite * this.query.stuek;

      let uri = "/api/store/unmasstafel";
      axios
        .post(uri, this.query)
        .then(response => (this.materialblock = response.data));

      this.Blocknummer();
    },
    getmaterial() {
      axios
        .get("api/materialblock")
        .then(response => (this.materialblock = response.data));
    },
    materiallist() {
      axios
        .get("api/materiallist")
        .then(response => (this.materialist = response.data));
    },
    Stark() {
      axios.get("/stark").then(response => (this.stark = response.data));
    },
    Art() {
      axios.get("/art").then(response => (this.art = response.data));
    },

    lieferantenpost() {
      let uri = "/api/searchQuery/lieferant";
      axios
        .post(uri, "suchen=" + this.searchQuery)
        .then(response => (this.lieferant = response.data));
    },
    searchQuerypost() {
      let uri;
      uri = "/api/searchQuery/material";

      axios
        .post(uri, "suchen=" + this.searchQuerym)
        .then(response => (this.material = response.data));
    },
    Blocknummer() {
      const timstamp = new Date();
      this.block = this.formattedblock(timstamp);
    },
    kundennummer(key, val, valalias) {
      this.kundenid = key;
      this.searchQuery = val + " " + valalias;
      showlieferant = false;
    },
    materialnummer(key, val) {
      this.materialid = key;
      this.searchQuerym = val;
      this.showmaterial = false;
    },
    artnummer(key, val) {
      this.artid = key;
      this.artname = val;
      this.showart = false;
    },
    starknummer(key, val) {
      this.starkid = key;
      this.starkname = val;
      this.showstark = false;
    },
    formattedDate(val) {
      return moment(val).format("YYYY-MM-DD");
    },
    formattedblock(val) {
      return moment(val).format("x");
    }
  },

  filters: {
    bemassung: function(val) {
      return val + " cm";
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
