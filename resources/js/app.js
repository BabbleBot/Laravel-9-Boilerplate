import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';

const componentFiles = import.meta.globEager(
  '../components/**/*.vue'
);

var app = createApp({
  el: '#app',
})

Object.entries(componentFiles).forEach(([path, m]) => {
  const componentName = _.upperFirst(
    _.camelCase(path.split('/').pop().replace(/\.vue$/, ''))
  );
  app.component(
    `${componentName}`, m.default
  );
})

console.log(app)

app.mount("#app")