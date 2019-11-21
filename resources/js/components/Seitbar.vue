<template>
  <div class="seitbar">
    <nav class="nav flex-column">
 <router-link to="/">
        <a class="nav-link">Dashboart</a>
      </router-link>
<router-link to="/kunden">
        <a class="nav-link">Kunden</a>
      </router-link>
      <router-link to="/kundencrate">
        <a class="nav-link">New Kunden</a>
      </router-link>

      <router-link to="/projekt">
        <a class="nav-link">Projekt</a>
      </router-link>
   <router-link to="/newprojekt">
        <a class="nav-link">Neues Projekt</a>
      </router-link>
  <router-link to="/aufgaben">
        <a class="nav-link">Aufgaben</a>
      </router-link>
  <router-link to="/newaufgaben">
        <a class="nav-link">Neues Aufgaben</a>
      </router-link>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </nav>
  </div>
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
    post() {
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
  }
};
</script>
