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
      var results = span.text().match(new RegExp(regexp, 'i')); //'i' pour dire d'ignorer la casse
      //masquer ceux qui ne sont pas dans les résultats
      if(!results) {
        span.parent().hide();
      }
    });
  });
})(jQuery);

$("#recherche").click(function() {
       $( "#formAjoutCarte" ).animate({left: "1600px"},5);
        // Animation complete.
      
});