<template>
  <div class="menu">
    <!-- <app-link v-if="link" class="dropdown-title" :link="link"> -->
      <slot name="title"></slot>
    <!-- </app-link> -->
    <!-- <span v-else class="menu-title"> -->
      <!-- <span><slot name="title"></slot></span> -->
    <!-- </span> -->

    <ul
      class="dropdown"
      :class="{'top':anchors.top, 'bottom':anchors.bottom, 'left':anchors.left, 'right':anchors.right}"
      v-show="!collapse || show"
    >
      <app-dropdown-dynamic-list-render><slot name="default"></slot></app-dropdown-dynamic-list-render>
    </ul>
  </div>
</template>

<script>
  export default {
    props: {
      collapse: {
        type: Boolean,
        required: false,
        default: false,
      },
      anchor: {
        type: Array,
        required: false,
        default: ['top', 'left'],
        validator: v => {
          return (v.every(i => {return ['top', 'bottom', 'left', 'right'].includes(i)}))
        }
      },
    },

    data() {
      return {
        show: false,
      }
    },

    computed: {
      anchors() {return this.anchor.reduce((co, n) => ({...co, [n]:true}), {})}
    },

    methods: {
    }
  }
</script>

<style lang="scss" scoped>
  .menu{
    position: relative;

    ul{
      border: 1px solid red;
      position: absolute;

      &.top{top: 100%;}
      &.bottom{bottom: 100%;}
      &.left{left: 0;}
      &.right{right: 0;}

      > *{
        line-height: 1em;
      }
    }

    &:hover {
      ul{
        float: left;
        width: auto;
        display: flex;
        flex-flow: column;
      }
    }
  }


</style>
float: none;
  white-space:nowrap;
  clear:both;