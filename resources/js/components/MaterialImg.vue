<template>
<img src=" ">

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
      success: "",
      error: "",
      material:[],

    };
  },
  created: function() {},

  watch: {},

  computed: {},
  methods: {
    post() {
      axios.get("https://api.coindesk.com/v1/bpi/currentprice.json");
      then(function(response) {
        this.material = response.data;
        this.success = response.data.success;
      }).catch(function(error) {
        this.error = error;
      });
    },

    materialeach: function(val) {
      this.material.material.data.forEach((value, index) => {
        if (val == value.id) {
          this.name = value.material;
        }
      });
    }
  },
  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
