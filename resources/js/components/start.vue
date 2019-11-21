<template>
  <form id="search">
    Search <input name="query" v-model="searchQuery">
  </form>


</template>

<script>
export default {
  props: {},


  data: function() {
    return {
      info: {},
      name: "",
      description: "",
      output: "",
          itemActions: {
      type: Array,
      default () {
        return [
          { name: 'edit-item', permission: `UPDATE_${this.apiUrl.toUpperCase()}`, icon: 'fas fa-pencil-alt', class: 'btn btn-info' },
          { name: 'delete-item', permission: `DESTROY_${this.apiUrl.toUpperCase()}`, icon: 'fas fa-trash-alt', class: 'btn btn-danger' }
        ]
      }
    },
    };
  },
  created: function() {},

  watch: {},


  computed: {},
methods: {
 post () {
      axios
        .get("https://api.coindesk.com/v1/bpi/currentprice.json")
        .then(response => (this.info = response));
    },




},

  filters: {},
 mounted() {
    console.log("Component mounted.");
  },

};
</script>
