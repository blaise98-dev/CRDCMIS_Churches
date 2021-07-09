var locationData = {};
var provname = distname = sectname = cellname = ''

$.get({
	// url: "/api/locations/all",
	url: "/locations/all_locations.json?t=121222",	
	cache: true
},
(data) => {
	locationData = data
	console.log("Data loaded")
	console.log(data)
});


$(".open-form").on('click', (ev) => {
	// Open the form
	ev.preventDefault()

	// update the language
	language = $(ev.currentTarget).data('lang')

	// Adjust transport names in the language
	var modes = $("#transport-input option");
	
	// Change the default transport method text
	if(language == 'kin'){
		$("#transport-input .default-opt").html('Hitamo')
	}else if(language == 'en'){
		$("#transport-input .default-opt").html('Select')
	}
	for(var n = 0; n<modes.length; n++){
		var transport_mode = modes[n]
		if(language == 'kin'){
			var text = $(transport_mode).data('kin')
		}else if(language == 'en'){
			var text = $(transport_mode).data('en')
		}

		$(transport_mode).html(text)
	}

	// Change description's language
	$("#comment").attr("placeholder", $("#comment").data(language))
	$("#place_name_input").attr("placeholder", $("#place_name_input").data(language))
	
	return openForm();
})

function openForm(){
	var elem = $("#request-form")
	elem.removeClass("d-none")
	$('html, body').animate({
        scrollTop: elem.offset().top
    }, 1500);
}

$("#transport-input").on('change', (ev) => {
	console.log(ev)
	var require_plate = $(ev.currentTarget).find("option:selected").data('plate')

	if(require_plate){
		$(".numberplate").removeClass('d-none')
	}else{
		$(".numberplate").addClass('d-none')
	}
})


$(".province-input").on('change', (event) => {
	// get the provname of the selected option[povince]
	provname  = $(event.currentTarget).children("option:selected").data("provname")

	// empty the other version
	var selectbox = $(event.target).parents(".input-section").find('.district-input')
	selectbox.find('option:not(.default-opt)').remove();

	console.log(event)
	// Get the districts in province
	var districts = locationData[provname].districts
	console.log(districts)
	Object.keys(districts).forEach((district, key) => {
		selectbox.append(`<option value="${districts[district].id}">${district}</option>`)
		console.log("Turahari", key, district)
	})
})

$(".district-input").on('change', (event) => {
	// get the name of the selected option
	distname = $(event.currentTarget).children("option:selected").html()

	var selectbox = $(event.target).parents(".input-section").find('.sector-input')
	selectbox.find('option:not(.default-opt)').remove();

	console.log(distname)

	// Get the districts in province
	var sectors = locationData[provname].districts[distname].sectors
	console.log(sectors)
	Object.keys(sectors).forEach((sector, key) => {
		selectbox.append(`<option value="${sectors[sector].id}">${sector}</option>`)
		// console.log("Turahari", key, district)
	})
})

$(".sector-input").on('change', (event) => {
	// get the name of the selected option
	sectname = $(event.currentTarget).children("option:selected").html()

	console.log(sectname)
	var selectbox = $(event.target).parents(".input-section").find('.cell-input')
	selectbox.find('option:not(.default-opt)').remove();

	// Get the cellls in sector
	var cells = locationData[provname].districts[distname].sectors[sectname].cells
	console.log(cells)
	Object.keys(cells).forEach((cell, key) => {
		selectbox.append(`<option value="${cells[cell].id}">${cell}</option>`)
	})
})


$(".cell-input").on('change', (event) => {
	// get the name of the selected option
	cellname = $(event.currentTarget).children("option:selected").html()

	console.log(cellname)
	var selectbox = $(event.target).parents(".input-section").find('.village-input')
	selectbox.find('option:not(.default-opt)').remove();

	// Get the cellls in sector
	var villages = locationData[provname].districts[distname].sectors[sectname].cells[cellname].villages
	console.log(villages)
	villages.forEach((village, key) => {
		console.log(village, village.id)
		selectbox.append(`<option value="${village.id}">${village.name}</option>`)
	})
})


