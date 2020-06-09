require('./bootstrap');
import Vue from 'vue';

import App from './App.vue';
// import ElementUI from 'element-ui';
// Vue.use(ElementUI);
// import 'element-ui/lib/theme-chalk/index.css';
// import Button  from 'element-ui/packages/button'
// export const/ 
import { 
  Button, 
  Pagination,
  Input, 
  Select, 
  Table, 
  TableColumn, 
  Form, 
  FormItem, 
  Option, 
  Slider, 
  Row, 
  Col, 
  Loading
} from 'element-ui';

Vue.use(Button);
Vue.use(Pagination);
Vue.use(Input);
Vue.use(Select);
Vue.use(Table);
Vue.use(TableColumn);
Vue.use(Form);
Vue.use(Option);
Vue.use(FormItem);
Vue.use(Slider);
Vue.use(Row);
Vue.use(Col);
Vue.use(Loading);


new Vue({
  el: '#app',
  render: h => h(App)
});
