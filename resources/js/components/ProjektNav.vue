<template>
  <ul class="nav nav-tabs justify-content-center">
    <router-link to="/projekt">
      <li class="nav-item">
        <a class="nav-link" :class="cssprojekt" @click.prevent="page='projekt'" href="#">Projekte</a>
      </li>
    </router-link>

    <li class="nav-item">
      <a
        class="nav-link"
        :class="csskontakt"
        href="#"
        @click.prevent="page='kontakt'"
      >Kontakte zum Projekt</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">Aufgaben</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Zeitaufwand</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled>Projekt-Übersicht</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hinweise</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dokumente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Ereignisse</a>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    projektid: {
      type: Number,
      default() {
        return null;
      }
    },
    kundenid: {
      type: Number,
      default() {
        return null;
      }
    },
    pagen: {
      type: String,
      default() {
        return null;
      }
    }
  },

  data: function() {
    return {
      cssprojek: "",
      csskontakt: "",
      info: {},
      page: "",
      description: "",
      output: ""
    };
  },
  created: function() {
    this.cssclass();
    this.addPage(this.$route.query.page);
  },

  watch: {
    page: function(val, oldval) {
      this.addPage(val);
      this.cssclass();
    },

    eidtpath: function name(val, oldVal) {
      this.cssclass();
    },

  },

  computed: {},
  methods: {
    addPage(val) {
this.page=val

      this.$router.push({
        name: "projekt",
        query: { projekt: this.projektid, page: val  }
      });
    },

    // TODO**nicht gebraucht

    editadd(id) {
      this.$router.push({ name: "projekt", query: { projekt: id } });
    },
    cssclass: function(val, oldval) {
      if (this.$route.query.page == "projekt") {
        this.cssprojekt = "active";
      } else {
        this.cssprojekt = "";
      }
      if (this.$route.query.page == "kontakt") {
        this.csskontakt = "active";
      } else {
        this.csskontakt = "";
      }
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
