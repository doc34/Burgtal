<template>
  <div class="fixed top-0 right-0 m-6">
    <div v-if="message.text"
      :class="{
        'alert alert-danger': message.type === 'error',
        'alert alert-success': message.type === 'success',
      }"
      class="rounded-lg shadow-md p-6 pr-10"
      style="min-width: 240px"
    >
      <button
        class="close opacity-75 cursor-pointer absolute top-0 right-0 py-2 px-3 hover:opacity-100"
      >
      </button>
      <div class="flex items-center">
        {{ message.text }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: { },
  data() {
    return {
      message:{} ,
    };
  },
};
</script>
