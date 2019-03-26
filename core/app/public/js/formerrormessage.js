
let myForm = document.getElementById('formular');
let message = document.getElementById('responseMessageError');
if(myForm !== null){
myForm["email"].addEventListener("blur",()=>{
	(myForm["email"].value.indexOf('@') <0)
	?message.innerHTML=`<div class ="display-flex ">
		    <div class="symbol-error"><span class="title text-ligth symbol-englob">X</span></div>
		    <div class="message-error text-ligth alert-message">Ceci n\'est pas une adresse mail valide</div>
		    <div class="symbol-error cross-close text-ligth text-bold pointer"></div>
		</div>`
    :
	message.innerHTML=""
});


myForm["password"].addEventListener("blur",()=>{
	(myForm["password"].value.length < 6 )
	? message.innerHTML = `<div class ="display-flex ">
		    <div class="symbol-error"><span class="title text-ligth symbol-englob">X</span></div>
		    <div class="message-error text-ligth alert-message">Mot de pass trop petit !</div>
		    <div class="symbol-error cross-close text-ligth text-bold pointer"></div>
		</div>`
	: message.innerHTML =``
});
}