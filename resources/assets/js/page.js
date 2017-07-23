// Import Core
import Form from './core/Form'

window.Form = Form;

import Popup from './components/Popup.vue'

window.vm = new Vue({
    el: '#app',

    mixins: [
        Popup.mixins
    ],

    components: {
        Popup
    },

	data: {
        form: new Form({
            email: '',
            phone: '',
            message: ''
        })
    },

    methods: {
        onSubmit(e) {
            this.form.post(e.target.action)
                .then(response => {
					alert(response.message);
				});
        }
    }
});








$('.testimonials-list').owlCarousel({
	loop: true,
    nav: false,
    items: 1,
    autoplay: false,
	smartSpeed: 500
});

$('.works-list').owlCarousel({
	loop: true,
    nav: false,
    items: 1,
    autoplay: false,
	smartSpeed: 500
});

$.fn.goTo = function(options) {
	var defaults = {
		offset: 0
	}; 
        
	var opts = jQuery.extend(defaults, options);

	let newPos = $(this).offset().top + opts.offset;
	
	$('html, body').animate({
		scrollTop: newPos + 'px'
	}, 400, $.easing.easeInSine);

	return this;
}