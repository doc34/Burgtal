<template>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link active" href="#">Active</a>
    </li>
    <li class="nav-item">
      <router-link to="/user">Go to User</router-link>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
</template>

<script>
export default {
  data: function() {
    return {
      info: {},
      name: "",
      description: "",
      output: ""
    };
  },
  created: function() {},

  watch: {},


  computed: {
    post () {
      axios
        .get("https://api.coindesk.com/v1/bpi/currentprice.json")
        .then(response => (this.info = response));
    }

  },
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
