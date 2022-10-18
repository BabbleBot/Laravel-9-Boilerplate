 import {createApp} from 'vue/dist/vue.esm-bundler';

 const componentFiles = import.meta.globEager(
   './components/**/*.vue'
 );

 var app = createApp({
   el: '#app',
 })

 Object.entries(componentFiles).forEach(([path, m]) => {
   let componentName, componentNameArray = path.split(/\.vue$/);

   componentNameArray = componentNameArray.shift().split(/\//);

   switch(componentNameArray[2]){
     case 'atoms':
       componentName = 'app';
     break;
     case 'molecules':
       componentName = 'app';
     break;
     case 'organisms':
       componentName = 'app';
     break;
     case 'templates':
       componentName = 'app';
     break;
     case 'views':
       componentName = 'view';
     break;
   };

   componentName += (componentName ? '-' : '') + componentNameArray.slice(3).join('-').toLowerCase();

   // console.log(path);
   // console.log(componentNameArray);
   // console.log(componentName);

   app.component(
     `${componentName}`, m.default
   );
 })
 /**
  * FONTAWESOME library + component
  * We are importing the fontawesome component and library, then loading into the library the different icons we'll
  * use throughout the app
  * Note the absence of 'app-' prefix to the name of the component
  * While not mandatory it serves as a reminder that this is an external lib and should not be tampered with
  */
 import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
 app.component('font-awesome-icon', FontAwesomeIcon);

 import { library } from '@fortawesome/fontawesome-svg-core'

 import {fas} from '@fortawesome/free-solid-svg-icons'
 import {far} from '@fortawesome/free-regular-svg-icons'
 import {fab} from '@fortawesome/free-brands-svg-icons'
 library.add(fas, far, fab)

 app.mount("#app")