// import vendor/modernizr.js
// import vendor/jquery.js
// import vendor/papaparse.js

$(document).ready(function(){

	Papa.parse("csv/export-small.csv", {
		download: true,
		step: function(row) {

			var str = row.data.toString();
			var arr = str.split(',');

			var hersteller = arr[6];
			var preis = arr[3];
			var bezeichnung = arr[7];

			var querschnitt = arr[9];
			var durchmesser = arr[10];
			var loadindex = arr[11];
			var speedindex = arr[12];
			var bauart = arr[15];

			var fahrzeugtyp = arr[14];
			if (fahrzeugtyp == "w") {
				var saison = "Winterreifen"
			};
			if (fahrzeugtyp == "s") {
				var saison = "Sommerreifen"
			};
			if (fahrzeugtyp == "g") {
				var saison = "Ganzjahresreifen"
			};

			$(".result-list").append("\
				<div class=\"item\">\
					<div class=\"row\">\
						<div class=\"left col-md-03\">\
							<div class=\"tire-wrapper\">\
								<img src=\"img/tire.png\" alt=\"tire\">\
							</div>\
						</div>\
						<div class=\"center col-md-05\">\
							<span class=\"type\">" + bauart + "-" + saison + "</span>\
							<span class=\"name\"><b>" + hersteller + "</b> " + bezeichnung +"</span>\
							<span class=\"nubmers\">" + querschnitt + "/" + durchmesser + " R" + loadindex + " " + speedindex + "T</span>\
						</div>\
						<div class=\"right col-md-04\">\
							<div class=\"row\">\
								<span class=\"price\">" + preis + " €</span>\
							</div>\
							<div class=\"row\">\
								<div class=\"col-md-06\">\
									<label for=\"menge\">Menge</label>\
									<input type=\"number\" class=\"menge\" name=\"menge\" min=\"0\" max=\"100\">\
								</div>\
								<div class=\"col-md-06\">\
									<button class=\"in-basket\">Warenkorb</button>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>");

		},
		complete: function() {
			console.log("All done!");
		}
	});

});