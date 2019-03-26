let form_add = document.getElementById('form_add');
let button_add = document.getElementById('ajoutez');

button_add.addEventListener("click",function(e) {
	let name = document.getElementById('name').value;
	let icon = document.getElementById('icon').value;
	let price = document.getElementById('price').value;
	let dateModification = document.getElementById('dateModification').value;
	let datas = `name=${name}&icon=${icon}&price=${price}&dateModification=${dateModification}`;
	asyncawaitpost('http://localhost/macata/core/app/src/request/matiere.admin.request.php',datas).then(function(response){
		console.log(response);
		document.getElementById('show_request').innerHTML = response;
	});
	e.preventDefault();

	//http://localhost/macata/core/app/src/request/matiere.admin.request.php//
	
	//get('http://localhost/macata/core/app/src/request/matiere.admin.request.php');

});