"use strict"

let app = new Vue({
    el: '#vue-comentario',
    data: {
        comments: []  
    },
    methods : {
        deleteComentario(id){
            fetch(`api/comentarios/${id}`, {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
            })
            .then(response => getComentarios())
            .catch(error => console.log(error));
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    getComentarios();
    document.querySelector('#form_comentario').addEventListener('submit', e => {
        // evita el envio del form default
        e.preventDefault();
        addComentario();
    });

});

function getComentarios() {
    let id =  document.querySelector('input[name="id_rueda"]').value;
    fetch('api/comentarios/'+id)
        .then(response => response.json())
        .then(comentarios => app.comments = comentarios)
        .catch(error => console.log(error));
}   

function addComentario() {
    if (validarComentario() == true){
        const comentario = {
            texto: document.querySelector('input[name="input_textoComentario"]').value,
            valoracion: checkValoracion(),
            id_rueda: document.querySelector('input[name="id_rueda"]').value
        }

        fetch('api/comentarios', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comentario)
        })
            /*.then(response => response.json())
            .then(comentario => app.comments.push(comentario))*/
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

