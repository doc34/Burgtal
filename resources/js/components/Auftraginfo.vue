<template>
<div >
<div class="card-group">
<div v-for="auftrag in auftrag" :key="auftrag.id"
 class="card mt-2" style="max-width: 340px;">

    <div class="card-header bg-transparent">
        {{auftrag.aufgabenum+'-'+ auftrag.teilenum}}
        <span class="float-right"
        :class="auftrag.css"
         >{{ 'Status: '+ auftrag.status }}</span>
        </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ auftrag.titel}}</h5>
        <p class="card-text">{{ auftrag.info}}</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
</div>
  </div>
</div>
</div>
</template>

<script>
export default {
  props: {

     auftrag: {
      type: Array,
      data:{},
      default: false
     }
    },



  data: function() {
    return {};
  },
  created: function() {},

  watch: { },
  computed: {},
methods: {},

  filters: {},
 mounted() {
    console.log("Component mounted.");
  },

};
</script>
