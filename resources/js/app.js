/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 
require('./bootstrap');

const username_input = document.getElementById('username') ;
const message_el = document.getElementById('messages') ;
const message_input = document.getElementById('message_input') ;
const message_form = document.getElementById('message_form') ;

message_form.addEventListener('submit',function(e){
e.preventDefault() ;

let has_errors = false ;

if(username_input.value == ''){
    alert("merci de renseigner votre nom");
    has_errors = true ;
} 
if(message_input.value == ''){
    alert("merci de renseigner votre klkm");
    has_errors = true ;
} 
if(has_errors){
    return;
}
const options = {
    method:'post' ,
    url:'/send-message',
    data:{
        username: username_input.value,
        message: message_input.value 
    },
    transformResponse:[(data) => {
        return data ;
    }]
}
axios(options) ;

});
 



window.Echo.channel('chat').listen('.message',(e)=>{
    
    message_el.innerHTML += '<div class="message"><strong>'+e.username +':</strong>'+ e.message
    +'</div>' ;
    
    });


window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import * as VueGoogleMaps from 'vue2-google-maps' ;

Vue.use(VueGoogleMaps,{
    load: {
        key: ''
    }
});

const app = new Vue({
    el: '#app',
});
