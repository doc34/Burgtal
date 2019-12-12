<template>
  <div>
    <div v-if="showform===true" class="card col-md-12 form mb-2">
      <div class="card-group">
        <div v-if="query.img " class="card col-md-2">
          <img :src="query.img" class="card-img-top" height="250" width="200" alt="..." />
        </div>

        <!-- enctype="multipart/form-data" -->

        <div class="card col-md-3">
          <form @submit="formImage" method="POST">
            <div class="form mt-3">
              <div class="form-group col-md-12">
                <div class="custom-file">
                  <input
                    v-on:change="onFileChange"
                    type="file"
                    class="custom-file-input"
                    id="validatedCustomFile"
                    required
                  />
                  <label class="custom-file-label" for="validatedCustomFile">{{query.img }}</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
              </div>

              <div class="form-group col-md-6">
                <button id="input" type="submit" class="form-control btn btn-primary">Speichern</button>
              </div>
            </div>
          </form>
        </div>
        <div class="card col-md-3 ml-1">
          <div class="card-body">
            <form v-if="query.id"  method="POST">
              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Material</span>
                  </div>
                  <input
                    v-model="query.material"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>

              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">COD</span>
                  </div>
                  <input
                    v-model="query.m_cod"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>
              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">MultiCastor</span>
                  </div>
                  <input
                    v-model="query.calk"

                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>
              <button @click.prevent="formUpdate" id="input" type="submit" class="form-control btn btn-primary col-3">Speichern</button>
            </form>

             <form  v-if="!query.id"  method="POST">
              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                    store
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Material</span>
                  </div>
                  <input
                    v-model="query.material"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>

              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">COD</span>
                  </div>
                  <input
                    v-model="query.m_cod"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>
              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">MultiCastor</span>
                  </div>
                  <input
                    v-model="query.calk"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>
              <button @click.prevent="formStore"  id="input" type="submit" class="form-control btn btn-primary col-3">Speichern</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showtable === true" class="card Table">
      <label class="sr-only" for="inlineFormInputGroup">Material</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="material-icons input-group-text">search</div>
        </div>
        <input
          ref="search"
          type="text"
          class="form-control"
          id="inlineFormInputGroup"
          placeholder="Material"
          v-model="searchQuery"
        />
      </div>

      <nav v-if="material.material" class="float-right" aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              tabindex="-1"
              @click.prevent="tablepagenate(material.material.first_page_url)"
              aria-disabled="true"
            >Previous</a>
          </li>
          <li v-for="n in material.material.last_page" :key="n" class="page-item">
            <a
              class="page-link"
              href="#"
              @click.prevent="tablepagenate(material.material.path+'?page='+n)"
            >{{n}}</a>
          </li>

          <li class="page-item">
            <a
              class="page-link"
              @click.prevent="tablepagenate(material.material.next_page_url)"
              href="#"
            >Next</a>
          </li>
        </ul>
      </nav>

      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">cod</th>
            <th scope="col">MultiCator</th>
            <th scope="col">Bild</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody v-if="material.material">
          <tr v-for="material in material.material.data" :key="material.id">
            <th scope="row">{{material.id}}</th>
            <td>{{material.material}}</td>
            <td>{{material.m_cod}}</td>
            <td>{{material.calk}}</td>
            <td>
              <img class="img-vue"  v-if="material.img" :src="material.img" height="40px" width="40px" />
            </td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button
                  @click.prevent="editmaterial(material.id)"
                  type="button"
                  class="btn btn-outline-secondary"
                >Edit</button>
                <button type="button" class="btn btn-secondary">up</button>
                <button
                  @click.prevent="delmaterial(material.id)"
                  type="button"
                  class="btn btn-danger"
                >Löschen</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<style scoped>

.img-vue:hover {


	 height:400px;
     width: 400px;
	opacity: 1;


}


</style>
<script>
export default {
  props: {},

  data: function() {
    return {
      showtable: true,
      showform: true,
      searchQuery: "",
      query: {},
      info: {},
      name: "",
      description: "",
      output: "",
      success: "",
      material: {
        type: Array,
        default() {
          return [];
        }
      },

    };
  },
  created: function() {
    this.showmaterial();
  },

  watch: {
    searchQuery: function(val, oldVal) {
      this.info = val;

      this.searchQuerypost();
    }
  },

  computed: {},
  methods: {
    onFileChange(e) {
      console.log(e.target.files[0]);
      this.query.img = e.target.files[0];
    },
    formStore(e) {
      e.preventDefault();


      this.query.calk = this.query.calk.replace(",", ".");

      axios
        .post(`/api/store/material`, this.query)
        .then(function(response) {
          this.material = response.data;
          this.success = response.data.success;
        })
        .catch(function(error) {
          this.output = error;
        });
      this.showtable = true;
      this.showform = false;
      this.showmaterial();
    },

    formUpdate() {


      this.query.calk = this.query.calk.replace(",", ".");

      axios
        .post(`/api/updata/material`, this.query)
        .then(function(response) {
          this.material = response.data;
          this.success = response.data.success;
        })
        .catch(function(error) {
          this.output = error;
        });
      this.showtable = true;
      this.showform = false;
      this.showmaterial();
    },



    formImage(e) {
      e.preventDefault();


      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      let formData = new FormData();
      formData.append("file", this.query.img);
      axios
        .post(`/api/img/material/${this.query.id}`, formData, config)
        .then(function(response) {
          this.material = response.data;
          this.success = response.data.success;
        })
        .catch(function(error) {
          this.output = error;
        });
      this.showmaterial();
      this.showtable = true;
      this.showform = false;
    },
    delmaterial(id) {
      let uri = "/api/del/material";
      axios
        .post(uri, "id=" + id)
        .then(response => (this.material = response.data));
      this.showmaterial();
    },
    showmaterial() {
      let uri = "/api/show/material";
      axios.post(uri).then(response => (this.material = response.data));
    },
    searchQuerypost() {
      let uri;
      uri = "/api/searchQuery/material";

      axios
        .post(uri, "suchen=" + this.searchQuery)
        .then(response => (this.material = response.data));
    },
    tablepagenate(uri) {
      this.info = uri;

      axios.get(uri).then(response => (this.material.material = response.data));
    },
    editmaterial(val) {
      this.material.material.data.forEach((value, index) => {
        if (val == value.id) {
          this.query.id = val;
          this.query.material = value.material;
          this.query.m_cod = value.m_cod;
          this.query.img = value.img;
          this.query.calk = value.calk;
        }
      });

      this.showtable = false;
      this.showform = true;
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
