"use strict"

let app = new Vue({
    el: '#Vue-comments',
    data: {
        comments: [] ,
        subtitle: "Comentarios" 
    },
    methods: {
        getComentarios: function() {
            getComentarios();
        },

        deleteComentario(id_comentario){
            fetch(`api/comentarios/${id_comentario}`, {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
            })
            
            .then(response => getComentarios())
            .catch(error => console.log(error));
        
    },
}});

app.getComentarios();
  

document.addEventListener('DOMContentLoaded', () => {
    
    
    document.querySelector('#botonComentario').addEventListener('click', e => {
        // evita el envio del form default
        e.preventDefault();
        addComentario();
    });

});

function getComentarios() {
    let urlParts = window.location.href.split("/");
    let id = urlParts[urlParts.length - 1];
    let url = "http://localhost:80/WEB2/web2-TPE1/api/comentarios/" + id;
    fetch(url)
      .then((response) => response.json())
      .then((comentarios) => (app.comments = comentarios))
      .then((console.log(app.comments)))
      .catch((error) => console.log(error));
  }


function addComentario() {
    if (validarComentario() == true){
        let dataC = {
            comentario: document.querySelector('input[name="input_textoComentario"]').value,
            valoracion: checkValoracion(),
            id_botin: document.getElementById("botinardo").value
        }

        fetch('api/comentarios', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(dataC)
        })
           /* .then(response => response.json())
           /* .then(comentario => app.comments.push(comentario))*/
            .then(response => getComentarios())
            .catch(error => console.log(error));
    ResetComentario();
    }

}


function checkValoracion(){
    for (let i = 1; i <= 5; i++){
        if (document.querySelector(`input[name="radio${i}"]`).checked){
            return (document.querySelector(`input[name="radio${i}"]`).value);
        }
    }  
}

function validarComentario(){
    if (document.querySelector('input[name="input_textoComentario"]').value != ""){
        if (checkValoracion() > 0){
            return true;
        }else return false;
    }else return false;
}

function ResetComentario(){

    document.querySelector('input[name="input_textoComentario"]').value = "";
    for (let i = 1; i <= 5; i++) {
        document.querySelector(`input[name="radio${i}"]`).checked = false;
    }


}