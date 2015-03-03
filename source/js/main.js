// import vendor/modernizr.js
// import vendor/jquery.js

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name) {
    return $.getUrlVars()[name];
  }
});

$(document).ready(function(){
	
	var getTyp = $.getUrlVar('typ');
	var getWetter = $.getUrlVar('wetter');
	var getHersteller = $.getUrlVar('hersteller');
	var getSpeed = $.getUrlVar('speed');
	var getBreite = $.getUrlVar('breite');
	var getHoehe = $.getUrlVar('hoehe');
	var getZoll = $.getUrlVar('zoll');

	if (getTyp != undefined) {
	 	// $(document).scrollTop( $("#jumpanchor").offset().top );
	 	//document.getElementById("jumpanchor").scrollIntoView();
	 	$('html,body').animate({'scrollTop' : 500},1000);
	};

	if (getTyp != undefined) {
	  $("#typ").val(getTyp);
	};

	if (getTyp != undefined) {
	  $("#wetter").val(getWetter);
	};

	if (getTyp != undefined) {
	  $("#hersteller").val(getHersteller);
	};

	if (getTyp != undefined) {
	  $("#speed").val(getSpeed);
	};

	if (getTyp != undefined) {
	  $("#breite").val(getBreite);
	};

	if (getTyp != undefined) {
	  $("#hoehe").val(getHoehe);
	};

	if (getTyp != undefined) {
	  $("#zoll").val(getZoll);
	};

	$('#typ').bind('change', function (e) {
		if( $('#typ').val() == 'Motorrad') {
			$("#wetter option:contains(Andere)").attr('selected', 'selected');
		}
		else if( $('#typ').val() != 'Motorrad') {
			$("#wetter").val('s');
		}         
	});


	function load(){
	  if (localStorage) {
	    var savedBasket = localStorage.getItem("basket");
	    $(".basket").append(savedBasket);
	  }
	}

	load();

	function save(){
	  var basket = $(".basket").html();
	  if (localStorage) {
	    localStorage.setItem("basket", basket);
	  }
	}

	$(".in-basket").click(function(){
	  $(this).parent().parent().parent().parent().parent().addClass("added");
	  $(this).parent().parent().parent().parent().parent().clone(true,true).appendTo(".basket");
	  checkBasket();
	  calcItems();
	  save();
	});

	$(".remove-item").on( "click", function() {
	  $(this).parent().parent().parent().parent().parent().remove();
	  checkBasket();
	  calcItems();
	  save();
	});

	$(".plus").on( "click", function() {
	  var currentNumber = $(this).parent().find(".number").html();
	  currentNumber++;
	  $(this).parent().find(".number").html(currentNumber);
	  calcItems();
	  save();
	});

	$(".minus").on( "click", function() {
	  var currentNumber = $(this).parent().find(".number").html();
	  if (currentNumber >= 1) {
	    currentNumber--;
	    $(this).parent().find(".number").html(currentNumber);
	    calcItems();
	    save();
	  };
	});

	$(".contact-form").hide();

	function checkBasket () {
	  addItemsToHidden();
	  var count = $(".basket").children().length;
	  if (count == 0) {
	    $(".contact-form").hide();
	    $(".final-sum").hide();
	  } else {
	    $(".contact-form").show();
	    $(".final-sum").show();
	  }
	}

	function addItemsToHidden() {

	  var finalOrder = "";

	  $("#hidden-order").val('');

	  //var itemsInBasket = $(".basket").html();

	  $(".basket .item.added").each(function() {
	    var itemAddedName = $(this).find(".name").html();
	    var itemAddedArtikelNummer = $(this).find(".artikelnummer").html();
	    var itemAddedQuantity = $(this).find(".number").html();
	    var itemAddedPrice = $(this).find(".value").html();
	    var itemAddedTotal = "<div>" + itemAddedName + "<br>" + "<b>Nummer:</b> " + itemAddedArtikelNummer + "<br>" + "<b>Preis:</b> " + itemAddedPrice + " € <br>" + "<b>Menge:</b> " + itemAddedQuantity + "<br>";
	    finalOrder += itemAddedTotal + "<br><hr><br>";
	  });

	  //console.log(finalOrder);

	  var itemFinalSum = $(".final-sum").html();

	  $("#hidden-order").val(finalOrder + "<h2>" + itemFinalSum + "</h2>");

	};

	function calcItems (){

	  var finalPrice = 0;
	  
	  $(".item.added").each(function() {
	    var price = $(this).find(".value").html();
	    price = price.replace(/,/g , ".");

	    var number = $(this).find(".number").html();
	    var newPrice = parseFloat(price) * number;
	    newPrice = newPrice.toFixed(2);

	    finalPrice += parseFloat(newPrice);

	    $(this).append("<span class=\"item-sum hidden\">" + newPrice +  "</span>");

	  });

	  $(".final-sum").remove();
	  $(".total-price").append("<h3 class=\"final-sum\">Summe: " + finalPrice.toFixed(2) +  " €</h3>");
	  checkBasket();

	}

	if ($(".item.added").length > 0) {
	  calcItems();
	} else {
	  $(".contact-form").hide();
	}

	/*
	$(".contact-form").submit(function(e){
	    e.preventDefault()
	});
	*/
});