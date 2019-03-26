// function generate ajax 
/*
let resp;
function ajax(method,url,bool){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           resp = this.responseText;
           
        }
    };
    resp = xhr.responseText
    xhr.open(method,url,bool);
    xhr.send();
    resp = xhr.responseText
    return resp ? resp : 'pas charger ?';
}

function appelAjax() {
    return Promise(function(resolve, reject) {
        $.ajax({
             url: 'http://localhost/macata/core/app/src/request/formule.request.php'
        });
    });
}

appelAjax().then(function(resultat) {
 alert(resultat);
});
*/
function get(url) {
    return new Promise(function(resolve, reject) {
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if(xhr.readyState === 4){
                if(xhr.status === 200) {
                    resolve(xhr.responseText);
                } else {
                    reject(xhr);
                }
            }
        }
        xhr.open('GET', url, true);
        xhr.send();
    });
}

function post(url,data) {
    return new Promise(function(resolve, reject) {
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if(xhr.readyState === 4){
                if(xhr.status === 200) {
                    resolve(xhr.responseText);
                } else {
                    reject(xhr);
                }
            }
        }
        xhr.open('POST', url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(data);
       
    });

}



function show(id,data) {
    if(typeof(data)=='object'){
      //console.log(data)
        for(let elem in data){
            for(let index in data[elem]){
                document.getElementById(id).innerHTML += `<p>${data[elem][index]}</p>`;
            }
        }

     }else {
        document.getElementById(id).innerHTML = JSON.stringify(data);
     }
       
}

var reponseFetchString = async function (url,id) {
    let response  = await fetch(url);
    if(response.ok) {
        let data = await response.json();
        document.getElementById(id).innerHTML = JSON.stringify(data);
    }
    
}

var reponseFetchData = async function (url,id,tag=null,classe=null) {
    let response  = await fetch(url);
    if(response.ok) {
        let data = await response.json();
        document.getElementById(id).innerHTML = `<${tag} class="${classe}">${data.join('')}</${tag}>`;
    }    
}

var reponseFetchDataObject = async function (url,id,tag=null,classe=null) {
    let response  = await fetch(url);
    if(response.ok) {
        let data = await response.json();
        console.log(data);
        obb = data;
        document.getElementById(id).innerHTML =data;
        return obb;
    } 
}
/*
function ma(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XmlHttpRequest();
    xhr.open("GET", url);
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
  });
}
*/
var drawFetch = async function (url,method,type ='application/json',datas=null,id) {
    if(method =='GET' || method =='get'){
        let response = await fetch(url, {
        method:method,
        headers: {
            'Content-Type' : type
        },
        
       // body: JSON.stringify(datas)
        })
        
        if(response.ok) {
            let data = await response.json();
            //console.log(data);
            show(id,data);
        }
    }else {
        let response = await fetch(url, {
        method:method,
        headers: {
            'Content-Type' : type
        },
        
        body: JSON.stringify(datas)
        })
        
        if(response.ok) {
            let data = await response.json();
            //console.log(data);
            show(id,data);
        }
    }

}
//function generate html tag 
var generateHtmlTag = ((tag,data,id=null,classe=null) => `<${tag} id="${id}" class="${classe}">${data}</${tag}>`);
var generateHtmlTagArray = ((tag,data=[],id=null,classe=null) => `<${tag} id="${id}" class='${classe}'>${data.map(i=> i=generateHtmlTag(tag,i,id,classe)).join('')}</${tag}>`);

//function calculate


// function session


// function event
function recupFormsAndShow(form,id,events='blur',classe=null){
    let id_show = document.getElementById(id);
    if(events =='submit'){
        form.addEventListener('submit', function(e) {
            for(let inp =0; inp < form.length-1; inp++)
            {
                id_show.innerHTML += generateHtmlTag('div',form[inp].value,form[inp].name,classe);
            }
            e.preventDefault();
        });
        
    } else {
        for(let inp =0; inp < form.length; inp++)
        {
            form[inp].addEventListener(events,()=> id_show.innerHTML += generateHtmlTag('div',form[inp].value,form[inp].name,classe));
        }   
    }
}

function recupFormsAndShowRequest(form,id,events='blur',tag=null,classe=null){
    let id_show = document.getElementById(id);
    for(let inp =0; inp < form.length; inp++)
    {
        form[inp].addEventListener(events,()=> reponseFetchData("http://localhost/macata/core/app/src/request/reqtest.php?d="+form[inp].value+"","mm","div","bg-emerald"));
    }
}

function searchAndShow(id_search_input,events='blur'){
    let i = document.getElementById(id_search_input);
    if(i!==null){
        i.addEventListener(events,()=> reponseFetchData("http://localhost/macata/core/app/src/request/reqtest.php?d="+i.value+"","mm","div","bg-emerald"));
    }
}
// function for generate graphic and show data
function searching(id_search_input,url,events='blur',tag=null,id=null,classe=null){
    let i = document.getElementById(id_search_input);
    let rez ='';
    if(i!==null){
        i.addEventListener(events,()=>     
            get(url+i.value+"").then(function(response) {
                let data = JSON.parse(response)
                generateChartDoughnut('myChar','doughnut',[data.name,'red'],'test',[800,250],['rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'], [  'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'],options = null);
                /*
                for(let info in data)
                {
                    rez += generateHtmlTag('p',data[info],null,'bg-emerald');  
                }
                */
               rez = `${generateHtmlTag(tag,data.id,id+'_id',classe)}
               ${generateHtmlTag(tag,data.code,id+'_code',classe)}
               ${generateHtmlTag(tag,data.name,id+'_name',classe)}
               ${generateHtmlTag(tag,data.statut,id+'_statut',classe)}`;
                document.getElementById('mm').innerHTML = rez
            }).catch(function(error){
                console.log(error)
            })
        );
    }
}

var asyncawait = async (url) => await get(url);
var asyncawaitpost = async (url,data) => await post(url,data);
function searchAndShowGraphic(id_search_input,events='blur'){
    let i = document.getElementById(id_search_input);
    if(i!==null){
           //i.addEventListener(events,()=> reponseFetchData("http://localhost/macata/core/app/src/request/reqtest.php?d="+i.value+"","mm","div","bg-emerald"));
        i.addEventListener(events,()=>{
            var rep = reponseFetchDataObject("http://localhost/macata/core/app/src/request/reqtest.php?d="+i.value+"","mm","div","bg-emerald");
            console.log(rep)
            generateChartDoughnut('myChar','doughnut',[i.value,'red'],'test',[80,20],[  'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'], [  'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'],options = null);
        });
    }
}