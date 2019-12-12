<template>
  <div class="row">
    <div class="card col-11 ml-3">
      <div class="card-body">
        <div class="form-row align-items-center">
          <div class="form-group col-md-3 col-sm-12">
            <div class="input-group-prepend">
              <div class="material-icons input-group-text">search</div>
              <input class="form-control" id="material" v-model=" searchQuery" />
            </div>
          </div>
          <div class="form-group col-md-3 col-sm-12">
            <multiselect
              v-model="searchLieferant"
              :options="lieferant"
              placeholder="Select Lieferant"
              label="name"
              :custom-label="nameWithLang"
              track-by="name"
            ></multiselect>
          </div>
          <div class="form-group col-md-2 col-sm-12">
            <div class="input-group-prepend">
              <div class="input-group-text">Material Art</div>
              <select class="form-control" name id="selectmateriallist" v-model="maleriallist_id">
                <option
                  v-for="materiallist in materiallist.materiallist"
                  :value="materiallist.id"
                  :key="materiallist.id"
                >{{materiallist.materal_list_name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-4 col-sm-12">
            <div class="input-group-prepend">
              <div class="input-group-text">Material Art</div>
              <multiselect
                v-model=" art_id"
                :options="options"
                :multiple="true"
                :close-on-select="false"
                :clear-on-select="false"
                :preserve-search="true"
                placeholder="Material Art"
                label="art"
                track-by="id"
                :preselect-first="true"
              ></multiselect>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <!-- Material nav -->
      <div v-if="material.material" class="card">
        <div class="card-header bg-transparent">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a
                  class="page-link"
                  @click="tablepagenate( material.material.first_page_url )"
                  href="#"
                >zurück</a>
              </li>
              <li v-if="material.material.current_page -1 > 0 " class="page-item">
                <a
                  @click="tablepagenate( material.material.path+'?page='+ (material.material.current_page-1))"
                  class="page-link"
                  href="#"
                >{{material.material.current_page -1}}</a>
              </li>
              <li v-else class="page-item disabled">
                <a class="page-link" href="#">{{material.material.current_page}}</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">{{material.material.current_page}}</a>
              </li>
              <li class="page-item">
                <a
                  class="page-link"
                  @click="tablepagenate( material.material.path+'?page='+ (material.material.current_page+1))"
                  href="#"
                >{{material.material.current_page + 1}}</a>
              </li>
              <li class="page-item">
                <a
                  class="page-link"
                  @click="tablepagenate( material.material.last_page_url )"
                  href="#"
                >{{material.material.last_page}}</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="card-body">
          <ul v-if="material.material" class="list-group list-group-flush">
            <li
              v-for="material in material.material.data"
              :key="material.id"
              @click.prevent="material_id = material.id"
              :class="cssclass(material.id)"
            >{{material.material}}</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- form input -->
    <div class="col-10">
      <div class="row">
        <div class="card col-12">
          <div class="card-body">
            <div class="card-header bg-transparent">
              <h4 class="card-text">
                {{materialname + ' ' +starkname }}
                <small
                  v-for="art in art_id"
                  :key="art.id"
                  class="text-muted"
                >{{art.art + ', '}}</small>
              </h4>
            </div>
            <form @submit.prevent="postform" methods="POST">
              <div class="form-row">
                <div class="form-group col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="materialNameLieferant">Materialname Lieferant</label>
                    <input
                      type="text"
                      class="form-control"
                      name
                      id="materialNameLieferant"
                      aria-describedby="helpId"
                      placeholder="Lieferanten Materialname"
                    />
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                </div>
                <div class="form-group col-md-2 col-sm-6">
                  <div class="form-group">
                    <label for="selectstark">Stark</label>
                    <select
                      ref="stark"
                      class="custom-select"
                      name
                      id="selectstark"
                      v-model="stark_id"
                    >
                      <option
                        v-for="stark in stark.stark"
                        :key="stark.id"
                        :value="stark.id"
                      >{{stark.stark | bemassung}}</option>
                    </select>
                  </div>
                </div>
                <div v-if="showformart=== true  " class="form-group col-md-2 col-sm-6">
                  <div class="form-group">
                    <label for>Format</label>
                    <select class="custom-select" name id>
                      <option
                        v-for="format in format"
                        :key="format.id"
                      >{{format.format + ' ' + format.format_info}}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                  <label for="inputPreis">Preis</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="preis"
                    id="inputPreis"
                    aria-describedby="helpId"
                    placeholder
                  />
                  <small id="helpId" class="form-text text-muted">Einkauf Preis</small>
                </div>
                <div class="form-group col-md-1">
                  <label for="input"></label>
                  <button
                    id="input"
                    type="submit"
                    class="form-control btn btn-primary mt-2"
                  >Speichern</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- table preis -->
        <div class="card col-12">
          <div v-if="preisliste.preisliste" class="card-body">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Lieferant</th>
                  <th>Name</th>
                  <th>stark</th>
                  <th>art</th>
                  <th>EK</th>
                  <th>EV</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="list in preisliste.preisliste" :key="list.id">
                  <td scope="row">{{list.materal_list_cod}}</td>
                  <td>{{list.name + ' ' + list.alias}}</td>
                  <td>{{list.material}}</td>
                  <td>{{list.stark | bemassung }}</td>
                  <td>{{list.art}}</td>
                  <td>{{list.preis + ' €'}}</td>
                  <td>{{ list.preis*list.factor | Nummer }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-outline-dark">Edit</button>
                      <button type="button" class="btn btn-outline-info">Bild</button>
                      <button type="button" @click.prevent="delmaterial(list.id)"  class="btn btn-danger">Löschen</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
</style>
</style>
<script>
import Multiselect from "vue-multiselect";

export default {
  props: {},

  data: function() {
    return {
      success: "",
      error: "",
      stark: {},
      art: {},
      format: {},
      selectstark: "",
      maleriallist_id: "",
      showartid: [],
      showstarkid: [],
      showformart: false,
      material: {},
      searchQuery: "",
      searchLieferant: [],
      materiallist: {},
      lieferant: [],
      preisliste: {},
      preis: "",
      description: "",
      output: [],
      query: {},
      material_id: "",
      materialname: "",
      starkname: "",
      art_id: [],
      stark_id: "",
      options: [],
      message: {},
      searchpreisliste: {
        kunde_id: false,
        material_id: false
      }
    };
  },
  components: {
    Multiselect
  },
  created: function() {
    this.Art();
    this.Stark();
    this.Format();
    this.Materiallist();
    this.getmaterial();
    this.postsearchLieferant();
  },

  watch: {
    searchQuery: function(val, oldval) {
      this.getmaterial();
    },
    material_id: function(val, oldval) {
      this.searchpreisliste.material_id = val;

      this.materialeach(val);

      this.postserarch(val);
    },
    stark_id: function(val, oldval) {
      this.starkeach(val);
    },
    "searchLieferant.id"(val) {
      this.searchpreisliste.kunde_id = val;
      this.postserarch(val);
    },
    maleriallist_id: function(val, oldval) {
      this.formatconf(val);
    }
  },

  computed: {},
  methods: {
    nameWithLang({ alias, name }) {
      if (alias) {
        return `${alias} - ${name}`;
      } else {
        return `${name}`;
      }
    },

    cssclass(val) {
      if (val == this.material_id) {
        return "list-group-item active";
      } else {
        return "list-group-item";
      }
    },

    tablepagenate(uri) {
      axios.get(uri).then(response => (this.material.material = response.data));
    },
    Stark() {
      axios.get("/stark").then(response => (this.stark = response.data));
    },
    Format() {
      axios
        .get("api/show/format")
        .then(response => (this.format = response.data));
    },
    Art() {
      axios.get("/art").then(response => (this.options = response.data.art));
    },
    Materiallist() {
      axios
        .get("api/materiallist")
        .then(response => (this.materiallist = response.data));
    },
    postsearchLieferant() {
      let uri = "/api/lieferant";
      axios.get(uri).then(response => (this.lieferant = response.data.kunde));
    },

    createart: function(id) {
      this.art.art.forEach((value, index) => {
        if (id == value.id) {
          this.showartid[id] = true;
          this.material_id.push("1");
        }
      });
    },

    postform() {
      let uri;

      uri = "/api/store/prisliste";

      this.query.art_id = this.art_id;
      this.query.material_id = this.material_id;
      this.query.kunde_id = this.searchLieferant.id;
      this.query.materiallist_id = this.maleriallist_id;
      this.query.stark_id = this.stark_id;
      this.query.preis = this.preis.replace(",", ".");

      axios
        .post(uri, this.query)
        .then(response => (this.preisliste = response.data.preisliste));
this.$refs.stark.focus();
this.preis='';
 this.postserarch();


    },
    postserarch() {
      axios
        .post("/api/serach/prisliste", this.searchpreisliste)
        .then(response => (this.preisliste = response.data));
    },
    getmaterial() {
      axios
        .post("/api/searchQuery/material", "suchen=" + this.searchQuery)
        .then(response => (this.material = response.data));
    },

    delmaterial(id) {
      let uri = "/api/del/prisliste";
      axios
        .post(uri, "id=" + id)
        .then(response => (this.preisliste = response.data));
      this.postserarch();
    },

    materialeach: function(val) {
      this.material.material.data.forEach((value, index) => {
        if (val == value.id) {
          this.materialname = value.material;
        }
      });
    },
    starkeach: function(val) {
      this.stark.stark.forEach((value, index) => {
        if (val == value.id) {
          this.starkname = value.stark + " cm";
        }
      });
    },
    formatconf: function(val) {
      let conf;
      this.materiallist.materiallist.forEach((value, index) => {
        if (val == value.id) {
          conf = value.format_conf;
        }
      });
      if (conf) {
        this.showformart = true;
      } else {
        this.showformart = false;
      }
    }
  },
  filters: {
    bemassung: function(val) {
      return val + " cm";
    },
    Nummer: function(val) {
      return val.toFixed(2) + " €";
    }
  },

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
