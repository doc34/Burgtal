<template>
  <div>
    <div class="card">
      <div class="card-header">
        <adminnav></adminnav>
      </div>
      <div class="card-body">

        <!-- Templade -->
        <AdminMaterial v-if="this.$route.query.page =='material' "></AdminMaterial>
      </div>
    </div>
    <MaterialEinkauf v-if="this.$route.query.page =='materialeinkauf' "></MaterialEinkauf>

<MaterialLieferant v-if="this.$route.query.page =='materiallieferant'"  ></MaterialLieferant>
  </div>
</template>

<script>
import Adminnav from "./AdminNav";
import AdminMaterial from "./AdminMaterial";
import MaterialEinkauf from "./MaterialEinkauf";
import MaterialLieferant from "./AdminMaterialLieferant";

export default {
  components: { Adminnav, AdminMaterial, MaterialEinkauf,MaterialLieferant },

  data: function() {
    return {
      page: this.$route.query.page,
      info: {},
      name: "",
      description: "",
      output: "",
      itemActions: {
        type: Array,
        default() {
          return [
            {
              name: "edit-item",
              permission: `UPDATE_${this.apiUrl.toUpperCase()}`,
              icon: "fas fa-pencil-alt",
              class: "btn btn-info"
            },
            {
              name: "delete-item",
              permission: `DESTROY_${this.apiUrl.toUpperCase()}`,
              icon: "fas fa-trash-alt",
              class: "btn btn-danger"
            }
          ];
        }
      }
    };
  },
  created: function() {
    this.addPage();
  },

  watch: {},

  computed: {},
  methods: {
    addPage() {
      this.page = this.$route.query.page;
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
