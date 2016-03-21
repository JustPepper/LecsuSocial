$('#address').click(function() {
	$('.hexagon').removeClass('hexactive animated bounceIn');
	$(this).addClass('hexactive animated bounceIn');
	$('.contact').hide().children('.mail').hide();
	$('.contact').show().children('.address').show().addClass('animated fadeInUp');
});

$('#mailto').click(function() {
	$('.hexagon').removeClass('hexactive animated bounceIn');
	$(this).addClass('hexactive animated bounceIn');
	$('.contact').hide().children('.address').hide();
	$('.contact').show().children('.mail').show().addClass('animated fadeInUp');
});

$('.responsive-menu').click(function(){
	$('.top-nav').toggleClass('show-menu animated slideInDown');
	$(this).toggleClass('menu-active');
	console.log('click');
});

jQuery(document).ready(function() {
    jQuery('.tabs .tab').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('tab');
 
        // Show/Hide Tabs
        jQuery('.content-tabs ' + currentAttrValue).addClass('ct-active animated fadeInUp').siblings().removeClass('ct-active');
 
        // Change/remove current tab to active
        jQuery(this).addClass('tab-active').siblings().removeClass('tab-active');
 
    });
});

$('.count-comments').click(function(){
	var parent = $(this).parent();
	var next = parent.next();
	$(next).toggleClass('show-next');
	$(this).toggleClass('count-comments-active');
});

$('.show-reply').click(function(e){
	e.preventDefault();
	var parent = $(this).parent();
	var parent = parent.parent();
	parent.next().toggle();
	$(this).toggleClass('options-active');
});

$('.header-user').click(function(){
    $(this).children('.medium-image').toggleClass('medium-image-active');
	$(this).children('nav').toggle();
});

$('.hdr-nav-notifications').click(function(){
	$(this).toggleClass('notifications-active');
	$(this).children('.notifications').toggle();
});

/* Zoom slider */


$('.zoom-content').click(function(e){
	var parent = $(this).parent().next();
	e.preventDefault();
	var value = parent.slick('slickGetOption', 'slidesToShow');
	if (value == 5) {
		parent.slick('slickSetOption', 'slidesToShow', 2, true);
	} else {
		parent.slick('slickSetOption', 'slidesToShow', 5, true);
	}
	parent.find('.book').toggleClass('book-zoom');
	if ($('#css-zoom').length) {
		$('#css-zoom').remove();
	} else {
		var cssZoom = '<style type="text/css" id="css-zoom">\
						  .slick-current {\
				            width: 500px;\
				        }\
				        </style>';

		$('head').append(cssZoom);
	}
	
})


/* VUE */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('[name="csrf_token"]').attr('content')
    }
});

Vue.component('follow', {
    template: '#follow-template',

    props: ['follower'],

    data: function() {
        return { 
            text: 'Seguir',
            active: '',
        }
    },

    methods: {
        onSubmit: function(e) {
            e.preventDefault();
            var self = this;
            var url = "follow/" + self.follower;
            $.ajax({
                method: "POST",
                url: url,
                success: function() {
                    self.checkFollower()
                }
            });
        },
        checkFollower: function() {
            var self = this;
            var url = "api/check/" + self.follower;
            $.ajax({
                method: "GET",
                url: url,
                success: function(data) {
                    if (data == true) {
                        self.text = 'Siguiendo';
                        self.active = 'button-active';
                    } else {
                        self.text = 'Seguir';
                         self.active = '';
                    }
                }
            });
        }
    },

    created: function() {
        this.checkFollower()
    }

});


Vue.component('ajaxbutton', {
    template: '#ajax-form',

    props: ['id', 'type', 'number'],

    data: function() {
        return {
            class: ''
        }
    },

    methods: {
        onClick: function(e) {
            e.preventDefault();
            var self = this;
            var url = self.type + '/' + self.id + '/like';
            $.ajax({
                method: "POST",
                url: url,
                success: function() {
                    self.check()
                }
            });
        },
        check: function() {
            var self = this;
            var url = 'api/' + self.type + '/like/' + self.id;
            $.ajax({
                method: "GET",
                url: url,
                success: function(data) {
                    data == true ? self.class = 'options-active' : self.class = '';
                }
            });
        }
    },

    created: function() {
        this.check()
    }

});

new Vue({
    el: 'body',

    data: {
      photo: ''
    },

    created: function() {
        var self = this;
        $.ajax({
            method: "GET",
            url: "api/photo",
            success: function(data) {
                self.photo = data;
            }
        });
    },

    methods: {
    	onChange: function() {
			that = this;
            formData = new FormData();
            formData.append('photo', this.$els.imagen.files[0]);
            $.ajax({
                type: 'POST',
                url: "photo",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    that.$set('photo', data);
                },
            });
		},

   },

});




