/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import './bootstrap';
 import { createApp } from 'vue';
 

 /**
  * Realtime update
  */
 
 /**
  * Next, we will create a fresh Vue application instance. You may then begin
  * registering components with the application instance so they are ready
  * to use in your application's views. An example is included for you.
  */
  Vue.component('example-component', require('./components/ExampleComponent.vue').default);
  Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
  Vue.component('chat-form', require('./components/ChatForm.vue').default);
 
  const app = new Vue({
     el: '#app',
     data: {
         messages: []
     },
 
     created() {
         this.fetchMessages();
 
         window.Echo.private('chat')
             .listen('MessageSent', (e) => {
                 this.messages.push({
                     message: e.message.message,
                     user: e.user,
                     to_user_id: e.to_user_id.to_user_id
                 });
             });
     },
 
     methods: {
         fetchMessages() {
             axios.get('/messages').then(response => {
                 this.messages = response.data;
             });
         },
 
         addMessage(message) {
             this.messages.push(message, to_user_id);
 
             axios.post('/messages', message, to_user_id).then(response => {
                 console.log(response.data);
             });
         }
     }
 });
 
 import ExampleComponent from './components/ExampleComponent.vue';
 app.component('example-component', ExampleComponent);
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
 //     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
 // });
 
 /**
  * Finally, we will attach the application instance to a HTML element with
  * an "id" attribute of "app". This element is included with the "auth"
  * scaffolding. Otherwise, you will need to add an element yourself.
  */
 
 app.mount('#app');
 