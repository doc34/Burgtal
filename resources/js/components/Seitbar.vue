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

      <router-link to="/projektdasch">
        <a class="nav-link">Projekt Daschboard</a>
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
      path: this.$route.path,
      description: "",
      cssprojekt:'',
    };
  },
  created: function() {},

  watch: {
path: function ( val, oldVal) {



}

  },

  computed: {},
  methods: {
   editcssprojekt: function (path) {
    if (path == '/projekt') {
        this.cssprojekt='active';
    }else{
        this.cssprojekt='';
    }

   }

  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
