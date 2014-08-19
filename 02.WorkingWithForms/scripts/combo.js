function cleanCombo() {
	document.getElementById('combo').options.length = 0;
}

function addOPtions(newOptions) {
	var select = document.getElementById('combo');
	for (var i = 0; i < newOptions.length; i++) {
		var opt = document.createElement('option');
	    opt.value = newOptions[i].trim();
	    opt.innerHTML = newOptions[i];
	    select.appendChild(opt);
	}
}

function fillCombo() {
	if (document.getElementById('continent').value == "Europe") {
		var newOptions = ["Bulgaria", "Italy", "Greece", "France", "Albania"];
		cleanCombo();
		addOPtions(newOptions);
	} else if (document.getElementById('continent').value == "Asia") {
		var newOptions = ["Afghanistan", "Cambodia", "China", "Kazakhastan"];
		cleanCombo();
		addOPtions(newOptions);
	} else {
		var newOptions = ["Mexico", "United States", "Canada"];
		cleanCombo();
		addOPtions(newOptions);
	}
}