$(document).ready(function(){
	$('#recherche').keyup(function(){

		var rechercher = $(this).val();
		var keyword ='q='+ rechercher

		if(rechercher.length > 2 && $q!="rien") {
			$.ajax({
				type:'GET',
				url:'http://www.letronedeferjce.com/webroot/ajax/result.php',
				data: keyword,
				success: function(server_reponse){
					$('.resultat').html(server_reponse).show();
				}
			});
		}
		else{
			$('.resultat').css('display','none');
		}
	});
});