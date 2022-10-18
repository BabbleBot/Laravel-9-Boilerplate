<template>
  <li>
    <app-link :link="link">
      <slot></slot>
    </app-link>
  </li>
</template>

<script>
  export default {
    props: {
      link: {},
      icon: {
        type: String,
        required: false,
        default: "",
      },
    }
  }
</script>

<style lang="scss" scoped>

</style>