if (!localStorage.hasOwnProperty('boxCounter')) {
	localStorage.boxCounter = 1;
}
if (!localStorage.hasOwnProperty('boxCounter2')) {
	localStorage.boxCounter2 = 1;
}
var progLangID = 2;
var langID = 2;

function removeLang(scene) {
	if (scene == 1) {
		var div = document.querySelector('#containerProgLang div:last-child');
		var div2 = document.querySelector('#containerProgLang div:nth-child(1)');
		localStorage.boxCounter--;
		if (div.id == div2.id) {
			localStorage.boxCounter++;
			return;
		}
	} else {
		var div = document.querySelector('#containerLang div:last-child');
		var div2 = document.querySelector('#containerLang div:nth-child(1)');
		localStorage.boxCounter2--;
		if (div.id == div2.id) {
			localStorage.boxCounter2++;
			return;
		}		
	}	

	div.remove();
}

function addLang(scene, shouldUpdate) {
	var newBox = document.createElement('div');
	if (scene == 1) {
		newBox.id = 'boxprogLang' + progLangID;
		progLangID++;
		var input = document.createElement("input");
		input.type = "text";
		input.name = "progLang[]";
		newBox.appendChild(input);

		var options = ["Baluk","Staaa","Mashina","Nakov"];

		var selectList = document.createElement("select");
		selectList.name = "progLevel[]";
		newBox.appendChild(selectList);

		for (var i = 0; i < options.length; i++) {
		    var option = document.createElement("option");
		    option.value = options[i];
		    option.text = options[i];
		    selectList.appendChild(option);
		}
		document.getElementById('containerProgLang').appendChild(newBox);
		if (shouldUpdate) {
			localStorage.boxCounter ++;
		}
	} else {
		function addOptions(options, selectList) {
			for (var i = 0; i < options.length; i++) {
			    var option = document.createElement("option");
			    if (i == 0) {
			    	option.value = "no";
			    } else {
			    	option.value = options[i];
			    }
			    option.text = options[i];
			    selectList.appendChild(option);
			}
		}

		newBox.id = 'boxLang' + langID;
		langID++;
		var input = document.createElement("input");
		input.type = "text";
		input.name = "lang[]";
		newBox.appendChild(input);

		var options = ["-Comprehension-","Beginner","Intermediate","Advanced"];

		var selectList = document.createElement("select");
		selectList.name = "comprehension[]";
		newBox.appendChild(selectList);

		addOptions(options, selectList);

		var options = ["-Reading-","Beginner","Intermediate","Advanced"];

		var selectList = document.createElement("select");
		selectList.name = "reading[]";
		newBox.appendChild(selectList);

		addOptions(options, selectList);

		var options = ["-Writing-","Beginner","Intermediate","Advanced"];

		var selectList = document.createElement("select");
		selectList.name = "writing[]";
		newBox.appendChild(selectList);

		addOptions(options, selectList);

		document.getElementById('containerLang').appendChild(newBox);

		if (shouldUpdate) {
			localStorage.boxCounter2 ++;
		}
	}
}

function loadCache() {
	var limit = localStorage.boxCounter;
	for (var i = 1; i < limit; i++) {
		addLang(1, false);
	}

	var limit = localStorage.boxCounter2;
	for (var i = 1; i < limit; i++) {
		addLang(2, false);
	}
}

window.onload = function() {
   if (sessionStorage.inputBoxes) {
      document.getElementById('containerProgLang').innerHTML = sessionStorage.inputBoxes;
   }

    if (sessionStorage.inputBoxes2) {
      document.getElementById('containerLang').innerHTML = sessionStorage.inputBoxes2;
   }
};

setInterval(function(){
	var div = document.querySelectorAll('#containerProgLang div select');
	for (var i = 0; i < localStorage.boxCounter; i++) {
		var ddl = div[i];
		var selectedValue = ddl.options[ddl.selectedIndex];
		for (var j = 0; j < 4; j++) {
			div[i][j].removeAttribute('selected');
		}
		selectedValue.setAttribute("selected","selected");
	}

	var el = document.querySelectorAll('#containerProgLang > div > input');
	for (var i = 0; i < localStorage.boxCounter; i++) {
		var value = el[i].value;
		el[i].setAttribute("value", value);
	}

	sessionStorage.inputBoxes = document.getElementById('containerProgLang').innerHTML;


	var div = document.querySelectorAll('#containerLang div select');
	for (var i = 0; i < localStorage.boxCounter2*3; i++) {
		var ddl = div[i];
		var selectedValue = ddl.options[ddl.selectedIndex];
		for (var j = 0; j < 4; j++) {
			div[i][j].removeAttribute('selected');
		}
		selectedValue.setAttribute("selected","selected");
	}

	var el = document.querySelectorAll('#containerLang > div > input');
	for (var i = 0; i < localStorage.boxCounter2; i++) {
		var value = el[i].value;
		el[i].setAttribute("value", value);
	}

	sessionStorage.inputBoxes2 = document.getElementById('containerLang').innerHTML;
},2000);