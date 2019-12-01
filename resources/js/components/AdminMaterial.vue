<template>
  <div>
    <div v-if="showform===true" class="card col-md-12 form mb-2">
      <div class="card-group">
        <div class="card col-md-2 border-0">
          <img src="/storage/material/Nero Impala.jpg" class="card-img-top" alt="..." />
        </div>

        <div class="card col-md-3">
          <form method="POST" enctype="multipart/form-data">
            <div class="form mt-3">
              <div class="form-group col-md-12">
                <div class="input-group mb-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Material</span>
                  </div>
                  <input
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
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"
                  />
                </div>
              </div>
              <div class="form-group col-md-12">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" required />
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
              </div>

              <div class="form-group col-md-6">
                <button id="input" type="submit" class="form-control btn btn-primary">Speichern</button>
              </div>
            </div>
          </form>
        </div>
<div class="card col-md-3">Infos</div>
<div class="card col-md-3">Infos</div>
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
          <li class="page-item disabled">
            <a
              class="page-link"
              href="#"
              tabindex="-1"
              @click.prevent="tablepagenate(material.material.first_page_url)"
              aria-disabled="true"
            >Previous</a>
          </li>
          <li v-for="n in material.material.last_page " :key="n" class="page-item">
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
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody v-if="material.material">
          <tr v-for="material in material.material.data" :key="material.id">
            <th scope="row">{{material.id}}</th>
            <td>{{material.material}}</td>
            <td>{{material.m_cod}}</td>
            <td>{{material.img}}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button
                  @click.prevent="editmaterial(material.id)"
                  type="button"
                  class="btn btn-outline-secondary"
                >Edit</button>
                <button type="button" class="btn btn-secondary">up</button>
                <button type="button" class="btn btn-secondary">Right</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

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
      material: {
        type: Array,
        default() {
          return [];
        }
      },
      itemActions: {
        type: Array,
        default() {
          return [
            {
              name: "edit-item",
              permission: `UPDATE_${this.apiUrl.toUpperCase()}`,
              icon: "fas fa-pencil-alt",
              class: "btn btn-info"
            },
            {
              name: "delete-item",
              permission: `DESTROY_${this.apiUrl.toUpperCase()}`,
              icon: "fas fa-trash-alt",
              class: "btn btn-danger"
            }
          ];
        }
      }
    };
  },
  created: function() {},

  watch: {
    searchQuery: function(val, oldVal) {
      this.info = val;

      this.searchQuerypost();
    }
  },

  computed: {},
  methods: {
    searchQuerypost() {
      let uri;
      uri = "/api/searchQuery/material";

      axios
        .post(uri, "suchen=" + this.searchQuery)
        .then(response => (this.material = response.data));
    },
    tablepagenate(uri) {
      this.info = uri;

      axios.get(uri).then(response => (this.material = response.data));
    },
    editmaterial(id) {
      let post;
      post = id;

      let uri;
      uri = "/api/edit/material";

      axios
        .post(uri, "id=" + post)
        .then(response => (this.material = response.data));

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
