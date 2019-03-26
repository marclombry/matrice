let formule_id = document.getElementById('formule_page');
if(formule_id !==null){
	const req = new XMLHttpRequest();
	req.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       let reponse = JSON.parse(this.responseText);
	       const formules = reponse.map((index) => `<tr><td>${index.id}</td><td>${index.code}</td><td>${index.name}</td><td>${index.statut}</td></tr>`).join('');
	       formule_id.innerHTML=`<table>${formules}</table>`;   
	    }
	};
	req.open('GET', 'http://localhost/macata/core/app/src/request/formule.request.php', true);
	req.send();
}