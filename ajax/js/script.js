$(document).ready(function(){
	$('#recherche').keyup(function(){
		var rechercher = $(this).val();
		var keyword ='q='+ rechercher
		if(rechercher.length > 3) {
			$.ajax({
				type:'GET',
				url:'ajax/result.php',
				data: keyword ,
				success: function(server_reponse){
					$('.resultat').html(server_reponse).show();
				}
			});
		}
	});
});