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
     
        <router-link to="/lager">
        <a class="nav-link">Unmaßtafeln</a>
      </router-link>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link" href="#">Link</a>

<!-- admin page nur mit rechte -->
 <router-link to="/admin">
        <a class="nav-link">Admin</a>
      </router-link>

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


  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
