<template>
  <div class="card mt-2">
    <div class="card-header">
      <h5>Kontakte</h5>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" href="#">Kontakte Hinzufügen</a>
        </li>
      </ul>
    </div>


    <div  class="card-body">
      <table class="table table-sm tabble-striped table-inverse">
        <thead class="thead-inverse">
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Telefon</th>
            <th>Handy</th>
            <th>Telefon-privat</th>
            <th>E-Mail</th>
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import KontakteForm from "./KontakteForm.vue";

export default {
  components: { KontakteForm },
  props: {
    kontakte: {
      type: Object,
      default() {
        return null;
      }
    }
  },

  data: function() {
    return {
        load:'0',
      kontakte: {},
      name: "",
      description: "",
      output:'',
      query: {
        projektid:this.$route.query.projekt ,
        kundenid: this.kunden
      }
    }
  },
  created: function() {
    this.addshow();
  },

  watch: {
load:function (val, oldval) {
if (val === 1) {
this.addshow();
}
},
output: function (val , oldval) {
this.addshow();

    }



  },

  computed: {},
  methods: {
    addshow() {
      let uri = "/api/show/kontakte";
      axios
        .post(uri, this.query)
        .then(
          response => (
            (this.kontakte = response.data),
            (this.countkontakte = response.data.kontakte.length)
          )
        );

    }
  },

  filters: {},
  mounted() {


    console.log("Component mounted.");
  }
};
</script>
