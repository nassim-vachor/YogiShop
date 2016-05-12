(function($){
	$('#header__icon').click(function(e){
		e.preventDefault();
		/*tpggle ajoute la classe si elle existe pas et l'enleve si elle existe deja*/
		$('body').toggleClass('with--sidebar');
	})
})(jQuery);