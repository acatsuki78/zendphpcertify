(function($, window, undefined) {

var home = function() {
	return new home.fn.init();
};

home.fn = home.prototype = {

	init: function() {
		this.bind();
	},

	bind: function() {

		var self = this;

		$('.dialog-button[value="Login"]').live("click",function(){
			self.load_login_page();
		})
		.unbind("click");
		
		$('.dialog-button[value="inscription"]').live("click",function(){
			self.load_inscription_page();
		}).unbind("click");

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

					$('.dialog-button[value="accueil"]').live("click",function(){
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
						})
						.unbind("click");
					});
				}
			},
			complete: function(){
				
				self.login_validate();
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
					$('.dialog-button[value="accueil"]').live("click",function(){
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
					})
					.unbind("click");
				}
			},
			complete: function(){
				self.validate_form();
			}
		});
	},

	login_validate: function() {
		var self = this;

		if ($('.dialog-green-button[value="valider"]').length){
			$('.dialog-green-button[value="valider"]').live("click",function(){
				var email = $('input[name="email"]').val(),
					pwd = $('input[name="pwd"]').val(),
					data_form = {
						'email': email,
						'pwd' : pwd
					};

				$.ajax({
					type: 'POST',
					url: 'Front/index/loginvalidate',
					data: {
						'data': data_form
					},
					dataType: 'json',
					success: function(res){
						console.log(res);

						if(res.ok === true){
							$('.dialog').remove();
							$('#menu').css('display','block');
							$('.content-canvas').html('<div class="breadcrumb"></div><div id="liste-quiz"><label class="titre">SELECTIONNEZ VOTRE QUIZ</label><div class="ctnr-quiz"><label class="titre-quiz">QUIZ N°1 : Test 1</label><div class="dificulty-blue"></div></div><div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis diam metus, euismod vitae accumsan eu, ornare eu nisi. Mauris mauris augue, interdum ac vehicula eget, placerat varius leo. Cras egestas pretium mattis. Aliquam erat volutpat. Cum sociis natoqu</div><div class="ctnr-quiz"><label class="titre-quiz">QUIZ N°2 : Test 1</label><div class="dificulty-blue"></div></div><div class="ctnr-quiz"><label class="titre-quiz">QUIZ N°3 : Test 1</label><div class="dificulty-green"></div></div><div class="ctnr-quiz"><label class="titre-quiz">QUIZ N°4 : Test 1</label><div class="dificulty-red"></div></div><div class="ctnr-quiz"><label class="titre-quiz">QUIZ N°5 : Test 1</label><div class="dificulty-red"></div></div></div>');
						}else{
							$('.dialog label.alert-error').css('display','block');
						}
					}
				});
			})
			.unbind("click");
		}else {
			console.log('ce bouton n\'existe pas');
		}

	},

	validate_form: function () {

		var self = this;

		if ($('.dialog-green-button[value="valider"]').length){
			$('.dialog-green-button[value="valider"]').live("click",function(){
				var nom = $('input[name="nom"]').val(),
					prenom = $('input[name="prenom"]').val(),
					email = $('input[name="email"]').val(),
					pwd = $('input[name="pwd"]').val(),
					data_form = {
						'nom': nom,
						'prenom' : prenom,
						'email' : email,
						'pwd' : pwd
					};

				$.ajax({
					type: 'POST',
					url: 'Front/index/validateinscription',
					data: {
						'data': data_form
					},
					dataType: 'json',
					success: function(res){
						if(res.ok === true){
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
						}
					}
				});

			})
			.unbind("click");
		}else {
			console.log('ce bouton n\'existe pas');
		}

	}

};

home.fn.init.prototype = home.fn.init();
// Export class
window.home = home;

})(jQuery, window);