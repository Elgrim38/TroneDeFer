(function($) {
	$('#filtreTraits').keyup(function(event) {
		var input = $(this);
		var val = input.val();		
		var regexp = '\\b(.*)';
		for(var i in val) {
			regexp += '(' + val[i] + ')(.*)';
		}
		regexp += '\\b';
		//réafficher tout
		$('#listeTraits li').show();		
		//ne pas faire la recherche si l'input est vide
		if(val == '') return true;
		//trouver les résultats
		$('#listeTraits').find('span').each(function() {
			var span = $(this);
			var results = span.text().match(new RegExp(regexp, 'i'));	//'i' pour dire d'ignorer la casse
			//masquer ceux qui ne sont pas dans les résultats
			if(!results) {
				span.parent().parent().parent().hide();
			}
		});
	});
	
	$('#vertu5').click(function(event) {
		if($('#lstType').val() == 5) {
			if($(this).is(':checked')) {
				$('#spnCout').prop('disabled', false);
			} else {
				$('#spnCout').prop('disabled', true);
			}
		}
	});
})(jQuery);

function changeOneStatus(item, disable, value) {
	if("null" == value) {
		//c'est un champ texte
		item.attr("checked", false);
	} else {
		//c'est une checkbox
		item.val(value);
	}
	item.prop('disabled', disable);
}

function changeVertusStatus(disable, ombreInclus) {
	var vertuGuerrier = $("#vertu4");
	var vertuLettre = $("#vertu1");
	var vertuMystique = $("#vertu3");
	var vertuNoble = $("#vertu2");
	var vertuOmbre = $("#vertu5");
	
	changeOneStatus(vertuGuerrier, disable, "null");
	changeOneStatus(vertuLettre, disable, "null");
	changeOneStatus(vertuMystique, disable, "null");
	changeOneStatus(vertuNoble, disable, "null");
	if(ombreInclus) {
		changeOneStatus(vertuOmbre, disable, "null");
	} else {
		changeOneStatus(vertuOmbre, false, "null");
	}
}

function changeStatus(stCout, stForce, stPrise, stOr, stInfluence, stInitiative, stIcones, stVertus, ombreInclus) {
	var cout = $("#spnCout");
	var force = $("#spnForce");
	var prise = $("#spnPrise");
	var or = $("#spnOr");
	var influence = $("#spnInfluence");
	var initiative = $("#spnInitiative");
	var icones = $("#listeIcones");
	
	changeOneStatus(cout, stCout, "");
	changeOneStatus(force, stForce, "");
	changeOneStatus(prise, stPrise, "");
	changeOneStatus(or, stOr, "");
	changeOneStatus(influence, stInfluence, "");
	changeOneStatus(initiative, stInitiative, "");
	changeOneStatus(icones, stIcones, "null");
	changeVertusStatus(stVertus, ombreInclus);
}

function change_type() {
	var type = parseInt($("#lstType").val());
	
	switch(type) {
		case 1:
			//Personnage
			changeStatus(false, false, true, false, false, false, false, false, true);
			break;
		case 2:
			//Lieu
			changeStatus(false, true, true, false, false, false, true, true, false);
			break;
		case 3:
			//Agenda
			changeStatus(true, true, true, false, false, false, true, true, true);
			break;
		case 4:
			//Attachement
			changeStatus(false, true, true, false, false, false, true, true, false);
			break;
		case 5:
			//Evènement
			changeStatus(true, true, true, true, true, true, true, true, false);
			break;
		case 6:
			//Complot
			changeStatus(true, true, false, false, true, false, true, true, true);
			break;
	}
}

function select_maison(me) {
	var maisons = $('#listeMaisons input');
	if(me.val() == maisons.first().val()) {
		maisons.each(function() {
			var input = $(this);
			if(input.val() != me.val()) {
				input.prop('checked', false);
			}
		});
	} else {
		maisons.first().prop('checked', false);
	}
}

function add_trait() {
	var input = $("#txtTrait");	var nb = $("#toAdd > span").length;
	if(input.val() != "" && nb < 5) {
		var lstToAdd = $("#lstToAdd");
		var toAdd = $("#toAdd");
		var newTrait = $("<span class='badge'>" + input.val() + "</span>").appendTo(toAdd);
		newTrait.click(function() {
			var lstToAdd = $("#lstToAdd");
			var liste = lstToAdd.val().split(";");
			var position = liste.indexOf($(this).text());
			liste.splice(position, 1);
			lstToAdd.val(liste.join(";"))
			$(this).remove();
		});
		if(nb == 0) {
			lstToAdd.val(input.val());
		} else {
			lstToAdd.val(lstToAdd.val() + ";" + input.val());
		}
	}
	input.val("");
}