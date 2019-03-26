let output = document.getElementById('showTirelires')
let result='<table class="table table-responsive"><thead><th>Propriètaire</th><th>Euros</th><th>Numéro de tirelire</th><th>Supprimer</th></thead><tbody>';
function getAllTirelires(){
  fetch('')
  .then(function(res){
    return res.json()
  })
  .then(function(data){
    let totaux = []
    data.forEach(function(ids){
     // alert(typeof ids.euros)
      totaux.push(parseFloat(ids.euros))
      result+=`<tr><td>${ids.proprietaire}</td><td>${ids.euros}</td><td>${ids.numero_de_tirelire}</td><td><a href="/tirelire/admin/delete/id/${ids.id_money}"><span class="glyphicon glyphicon-remove"></span></a></td></tr>`
    })
    const totals = totaux.reduce((a,b)=>a + b)
    result+=`<tr><td>TOTAL</td><td>${totals}</td></tr>`
    result+= `</tbody></table>`
    output.innerHTML= result
  })
}
//getAllTirelires()

document.getElementById('addPosts').addEventListener('submit',addPosts)
function addPosts(e) {
  //e.preventDefault();
  let euros = document.getElementById('euros').value;
  /*
  fetch('http://localhost/tirelire/core/app/admin/app/allTirelire.php', {
    method:'POST',
    headers: {
      'Accept': 'application/json, text/plain, ',
      'Content-type':'application/json'
    },
    body:JSON.stringify({euros:euros})
  })
  .then((res) => res.json())
  .then((data) => console.log(data))
  alert('ok');

  */
}