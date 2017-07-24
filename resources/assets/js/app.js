
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});*/

/*$("#Top-Nav-panel ul li").click(function(){
	alert("Nav panel clicked"+event.target.id);
	alert("Nav panel clicked"+event.srcElement.id);
	var id=event.target.id;
	$("#Top-Nav-panel ul li a").removeClass();
	$(id).addClass("active");
	});*/
/*$(embed).on("contextmenu",function(e){
    return false;
});*/
$('body').bind('cut copy paste', function (e) {
    e.preventDefault();
});

$("body").on("contextmenu",function(e){
    return false;
});