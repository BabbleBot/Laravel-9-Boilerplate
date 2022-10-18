<template>
  <a :href="link"><slot></slot></a>
</template>

<script>
  export default {
    props: {
      link: {
        type: String,
        required: true,
      },
    }
  }
</script>

<style lang="scss" scoped>
  a {
    display:inline-block;
    color: var(--colorTextLight);

    &:hover{
      color: var(--colorDominant);
    }
  }
</style>