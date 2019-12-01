<template>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a  @click.prevent="page='daschbo'" class="nav-link " href="#">Daschboard</a>
  </li>
  <li class="nav-item">
    <a  @click.prevent="page='material'" class="nav-link" href="#">Material</a>
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
  props: {},


  data: function() {
    return {
  page: {
      type: String,
      default() {
        return null;
      }
    },


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

  watch: {

  page: function(val, oldval) {
      this.addPage(val);
    //   this.cssclass();
    },

  },


  computed: {},
methods: {
   addPage(val) {
      this.page = val;

      this.$router.push({
        name: "Admin",
        query: { page: val }
      });
    },




},

  filters: {},
 mounted() {
    console.log("Component mounted.");
  },

};
</script>
