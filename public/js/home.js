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

		$('.dialog-button[value="Login"]').click(function(){
			self.load_login_page();
		});
		
		$('.dialog-button[value="inscription"]').click(function(){
			self.load_inscription_page();
		});

	},

	load_login_page: function(){

		var self = this;
		
		$.ajax({
			type: 'GET',
			url: '/ajaxlogin',
			dataType: 'json',
			success: function(res) {
				if(res.ok){
					$('.dialog').html(res.html);

					$('.dialog-button[value="accueil"]').click(function(){
						$.ajax({
							type: 'GET',
							url: '/ajaxhome',
							dataType: 'json',
							success: function(res) {
								if(res.ok){
									$('.dialog').html(res.html);
									self.bind();
								}
							}
						});
					});
				}
			}
		});
	},

	load_inscription_page: function(){

		var self = this;
		
		$.ajax({
			type: 'GET',
			url: '/ajaxinscription',
			dataType: 'json',
			success: function(res) {
				if(res.ok){
					$('.dialog').html(res.html);
					$('.dialog-button[value="accueil"]').click(function(){
						$.ajax({
							type: 'GET',
							url: '/ajaxhome',
							dataType: 'json',
							success: function(res) {
								if(res.ok){
									$('.dialog').html(res.html);
									self.bind();
								}
							}
						});
					});
				}
			},
			complete: function(){
				console.log('ici');
				self.validate_form();
			}
		});
	},

	validate_form: function () {

		if ($('.dialog-green-button[value="valider"]').length){
			console.log('exist');
			$('.dialog-green-button[value="valider"]').click(function(){
				var nom = $('input[name="nom"]').val(),
					prenom = $('input[name="prenom"]').val(),
					email = $('input[name="email"]').val(),
					pwd = $('input[name="pwd"]').val(),
					data = {
						'nom': nom,
						'prenom' : prenom,
						'email' : email,
						'pwd' : pwd
					};
				console.log(data);

				$.ajax({
					type: 'POST',
					url: '/ajaxvalidateinscription',
					data: data,
					dataType: 'json',
					success: function (res){
						console.log(res);
					}
				});

			});
		}else {
			console.log('ce bouton n\'existe pas');
		}

	}

};

login.fn.init.prototype = login.fn.init();
// Export class
window.login = login;

})(jQuery, window);