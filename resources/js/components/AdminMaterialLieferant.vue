<template>
  <div>
    <div class=" card-columns">
      <div class="card ">
        <div class="card-header">
            Factor </div>
<div class="card-body">
   <form @submit="poststorefactor">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="factor" v-model="ffactor">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="info" v-model="query.info" >
    </div>
 <button type="submit" class="btn btn-primary">speichern</button>
  </div>

</form>
</div>

        <div class="card-body">
<table class="table table-striped  table-responsive-sm">
    <thead class="thead-inverse">
        <tr  >
            <th>ID</th>
            <th>Factor</th>
            <th>info</th>
        </tr>
        </thead>
        <tbody>
            <tr
v-for="factor in factor.factor" :key="factor.id"
            >
                <td scope="row">{{ factor.id }}</td>
                <td>{{ factor.factor }}</td>
                <td>{{ factor.info }}</td>
            </tr>

        </tbody>
</table>



        </div>
      </div>

  <div class="card ">
        <div class="card-body">
          <h4 class="card-title">Material </h4>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: {},

  data: function() {
    return {
      info: {},
      name: "",
      ffactor: '',
      description: "",
      output: "",
      success: "",
      error: "",
      query: {

      },
      factor:{},
      dat:[],
    };
  },
  created: function() {
    this.postfactor();

  },

  watch: {},

  computed: {

  },
  methods: {
    postfactor() {
      axios
        .post("/api/schow/factor")
        .then(response => (this.factor = response.data));
    },
    poststorefactor() {
        this.query.factor = this.ffactor.replace(",", ".");
      axios
        .post("api/store/factor", this.query)
        .then(response => (this.factor = response.data));
    },

materialeach: function(val) {

 this.material.forEach((value, index) => {
        if (val == value.id) {
console.log(value.material);
           const data = new FormData();
              data =value.material

        }
      });

      this.dat.pusch(data);


   }

//return 'kein preis'



  },
  filters: {



  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
