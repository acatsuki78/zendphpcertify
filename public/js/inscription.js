(function($, window, undefined) {

var login = function() {
	return new login.fn.init();
};

login.fn = login.prototype = {

	init: function() {
		this.bind();
	},

	bind: function() {

		var self = this;

		$('.dialog-button[value="inscription"]').click(function(){
			self.validate_form();	
		});
	}

};

login.fn.init.prototype = login.fn.init();
// Export class
window.login = login;

})(jQuery, window);