<template>
  <div class="templade">
    <div class="card">
      <div class="card-header">
        <projektnav v-if=" projekt.projekt" :pagen="page" :projektid="projekt.projekt.id"></projektnav>
      </div>
    </div>
    <div class="card">
      <div class="form-row">
        <!-- linkeseite -->
        <div class="card-body">
          <h5
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
          >{{ projekt.projekt.projektnummer +': '+ projekt.projekt.projektname }}</h5>

          <p v-if=" projekt.projekt" class="cart-text border-bottom w-75">
            {{'Anglegt: ' + formattedDate( projekt.projekt.created_at)
            }}
          </p>
          <p
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
          >{{'Start: '+ projekt.projekt.start | start }}</p>
          <p
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
            :class="projekt.projekt.css"
          >{{'Status: '+ projekt.projekt.status }}</p>
        </div>

        <!-- rechteseite -->
        <div class="card-body">
          <h5
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
          >{{'Projektleiter: '+ projekt.projekt.projektleiter }}</h5>

          <p
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
          >{{'Beschreibung: '+ projekt.projekt.bschreibung}}</p>
          <p
            v-if=" projekt.projekt"
            class="cart-text border-bottom w-75"
          >{{'Info: '+ projekt.projekt.info}}</p>
        </div>
      </div>
    </div>
    <!-- einzelne Templade -->
    <div
    v-if="projekt.projekt"
     >
    <Kontakte-Form
     v-if="this.$route.query.page =='kontakt' "
    v-bind:projektid="this.$route.query.projekt"
    v-bind:kundenid="projekt.projekt.kunden_id"
    ></Kontakte-Form
    ></div>
  </div>
</template>

<script>
import Projektnav from "./ProjektNav.vue";
import KontakteForm from "./KontakteForm.vue";

import moment from "moment";

export default {
  components: {
    Projektnav,
    KontakteForm,

  },

  data: function() {
    return {
      projekt: {},
      name: "",
      description: "",
      page: this.$route.query.page
    };
  },
  created: function() {
    this.projektget();
    this.addPage();
  },

  watch: {},

  computed: {},
  methods: {
    addPage() {
      this.page = this.$route.query.page;
    },
    formattedDate(val) {
      return moment(val).format("d MMM YYYY");
    },

    projektget() {
      let uri = "/api/edit/projekt";

      axios
        .post(uri, "edit=" + this.$route.query.projekt)
        .then(response => (this.projekt = response.data));
    }
    // editadd(id) {
    //   this.$router.push({ name: "Aufgaben", query: { projekt_id: id } });
    // }
  },

  filters: {
    start: function(val) {

      if (val) {
        let value = "Noch kein Termin";
        return value;
      }

    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

