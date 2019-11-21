<template>
<div class="card">
<h4>Hallo Aufgabe</h4>
  <form id="search">
    Search <input name="query" v-model="searchQuery">
  </form>
</div>

</template>

<script>
export default {
  props: {},


  data: function() {
    return {
        searchQuery:"",
      info: {},
      name: "",
      description: "",
      output: ""
    };
  },
  created: function() {},

  watch: {},


  computed: {},
methods: {


  formSubmit(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/formSubmit", {
          name: this.name,
          description: this.description
        })
        .then(function(response) {
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    }


},

  filters: {},
 mounted() {
    console.log("Component mounted.");
  },

};
</script>
