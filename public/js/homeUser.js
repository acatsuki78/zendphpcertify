(function($, window, undefined) {

var homeUser = function() {
	return new homeUser.fn.init();
};

homeUser.fn = homeUser.prototype = {

	init: function() {
		this.bind();
	},

	bind: function() {

		var self = this;

		self.user_deconnexion();
		self.open_desc_quiz();

	},

	user_deconnexion: function() {

		var self = this;

		$('#menu label[data-name="deconnexion"]').live("click",function(){
			console.log('there');
			$.ajax({
				type: 'POST',
				url: 'Front/index/deconnexion',
				dataType: 'json',
				success: function(res){
					console.log(res.ok);
					$.ajax({
						type: 'GET',
						url: '/ajaxhome',
						dataType: 'json',
						success: function(res) {
							if(res.ok){
								$('.content-canvas').append('<div class="dialog"></div>');
								$('.dialog').html(res.html);
								$('#menu').css('display','none');
								$('#liste-quiz').css('display','none');
							}
						}
					});
				}
			});
		})
		.unbind("click");
	},

	open_desc_quiz: function() {
		$('.ctnr-quiz').live("click", function() {
			console.log('ici');
			if($('.description').css('height') == '0px'){
				$(this).next('.description').animate({
					'height' : '150px',
					'padding' : '15px'
				});
			}else{
				$(this).next('.description').animate({
					'height' : '0px',
					'padding' : '0px'
				});
			}
		})
		.unbind("click");
	}

};

homeUser.fn.init.prototype = homeUser.fn.init();
// Export class
window.homeUser = homeUser;

})(jQuery, window);