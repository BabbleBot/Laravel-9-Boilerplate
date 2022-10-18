<script>
import { h } from 'vue'
  export default {
    render() {
      let items = this.$slots.default()[0].children
      // console.log(items)
      return h(
        'div',
        items.map((item) => {
          return h('li', h(item))
        })
      )
    },
  }
</script>