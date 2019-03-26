let show_module = document.getElementById('show_module');
let show_form = document.getElementById('show_form');
let show_request = document.getElementById('show_request');
let nameRequest = '';
let url;
asyncawait("http://localhost/macata/core/app/src/request/module.request.php?method=delete",'blur','p','data','bg-carrot').then(function(response){
	show_module.innerHTML = response;
	let formule = document.getElementById('Formules');
	let matiere = document.getElementById('Matières-premières');
	let article = document.getElementById('Articles');
	let packagings = document.getElementById('Packagings');
	let parametre = document.getElementById('Paramètres');
	const moduleId = [formule,matiere,article,packagings,parametre];
	
	moduleId.map(function(index){
		index.addEventListener("click", function(e){
			e.preventDefault();
			nameRequest = index.getAttribute("id");
			//checkClass(index,'opacity6');
			//checkClass(index,'anim-rotate-full');
			if(nameRequest =='Formules'){
				url = "http://localhost/macata/core/app/src/request/formule.admin.request.php?method=delete";
				formule.classList.add('anim-rotate-full');
				formule.classList.remove('opacity6');
				matiere.classList.add('opacity6');
				article.classList.add('opacity6');
				packagings.classList.add('opacity6');
				parametre.classList.add('opacity6');

			}else if(nameRequest =='Matières-premières'){
				url = "http://localhost/macata/core/app/src/request/matiere.admin.request.php?method=delete";
				matiere.classList.add('anim-rotate-full');
				matiere.classList.remove('opacity6');
				formule.classList.add('opacity6');
				article.classList.add('opacity6');
				packagings.classList.add('opacity6');
				parametre.classList.add('opacity6');
			}else if(nameRequest =='Articles'){
				url = "http://localhost/macata/core/app/src/request/article.admin.request.php?method=delete";
				article.classList.add('anim-rotate-full');
				article.classList.remove('opacity6');
				matiere.classList.add('opacity6');
				formule.classList.add('opacity6');
				packagings.classList.add('opacity6');
				parametre.classList.add('opacity6');
			}else if(nameRequest =='Packagings'){
				url = "http://localhost/macata/core/app/src/request/packaging.admin.request.php?method=delete";
				packagings.classList.add('anim-rotate-full');
				packagings.classList.remove('opacity6');
				matiere.classList.add('opacity6');
				article.classList.add('opacity6');
				formule.classList.add('opacity6');
				parametre.classList.add('opacity6');
			}else if(nameRequest =='Paramètres'){
				url = "http://localhost/macata/core/app/src/request/parametre.admin.request.php?method=delete";
				parametre.classList.add('anim-rotate-full');
				parametre.classList.remove('opacity6');
				matiere.classList.add('opacity6');
				article.classList.add('opacity6');
				packagings.classList.add('opacity6');
				formule.classList.add('opacity6');
			}
			asyncawait(url,'blur','p','data','bg-carrot').then(function(response){
				console.log(response);
				show_request.innerHTML = response;
				
			});
			 
		});
		//index.classList.remove('anim-rotate-full');
	});	
});