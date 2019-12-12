<template>
  <div>
    <div v-if="auftrag" class="card-group">


      <div
        v-for="auftrag in auftrag"
        :key="auftrag.id"
        @click.prevent="addselect( auftrag.projekt_id ,auftrag.teile_id)  "
        class="card mt-2 text-success  "

        style="max-width: 340px;"
      >
        <div class="card-header bg-transparent">
          {{ auftrag.teilenum}}
          <span
            class="float-right"

          >{{ 'Status: '+ auftrag.status }}</span>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ auftrag.titel}}</h5>
            <p v-if="auftrag.info" class="card-text">{{ auftrag.info}}</p>
            <p class="card-text">
              <small class="text-muted">Last updated 3 mins ago</small>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: {
auftrag:{}

    // auftrag: {
    //   type: Array,
    //   data: {},
    //   default: false
    // }
  },

  data: function() {
    return {};
  },
  created: function() {},

  watch: {
      testid: function (val , oldval) {

      }
  },
  computed: {},
  methods: {
      addselect (projekt , val) {

this.$router.push({ name: 'projekt', query: { projekt: projekt ,aufgabe: val, page:'aufgaben' } })
      }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
