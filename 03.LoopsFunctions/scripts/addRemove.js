var studentCounter = 0;

function addStudent() {
	var table = document.getElementById('studentTable');
	var numRows = table.rows.length;
	var newRow = table.insertRow(numRows);
	newRow.id = "student" + studentCounter;
	var newCell1 = newRow.insertCell(0);
	var newCell2 = newRow.insertCell(1);
	var newCell3 = newRow.insertCell(2);
	var newCell4 = newRow.insertCell(3);

	newCell1.innerHTML = '<input type="text" name="firstname[]">';
	newCell2.innerHTML = '<input type="text" name="lastname[]">';
	newCell3.innerHTML = '<input type="email" name="email[]">';
	newCell4.innerHTML = '<input type="number" name="score[]"><button onclick="removeStudent(\'student' + studentCounter + '\'); return false;">-</button>';
	studentCounter++;
}

function removeStudent(numRow) {

	var id = document.getElementById(numRow).rowIndex;
	document.getElementById('studentTable').deleteRow(id);
}