// Carga inicial de preguntas al abrir la página
window.onload = function(){
    fetch("../../005-API/preguntas.php")
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
        console.log(datos)
        let plantilla = document.getElementById("plantillapregunta")
        let seccion = document.querySelector("section")
        for(let i = 0;i<datos.length;i++){
            let importado = document.importNode(plantilla.content,true);
            importado.querySelector("article").setAttribute("name",datos[i].Identificador); 
            importado.querySelector("h3").textContent = datos[i].titulo;
            importado.querySelector("time").textContent = datos[i].fecha;
            importado.querySelector("p").textContent = datos[i].texto;
            importado.querySelector("article").onclick = function(){
                let identificador = this.getAttribute("name")
                console.log("Has hecho click")
                console.log("El id es: "+identificador)
                cargaArticulo(identificador);
            }
            seccion.appendChild(importado);
            
        }
    })
    
    document.getElementById("iniciarsesion").onclick = function(){
        console.log("vamos a iniciar sesión");
        document.getElementById("modal").style.display = "block";
        
        let plantilla = document.getElementById("plantillainiciosesion");
        console.log(plantilla)
        let importado = document.importNode(plantilla.content,true);
        document.getElementById("contenedormodal").appendChild(importado);
    }
    
}
function cargaArticulo(identificador){
    document.querySelector("section").innerHTML = "";
    fetch("../../005-API/preguntayrespuestas.php?id="+identificador)
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
        console.log(datos)
        // Cargo las preguntas
        let plantilla = document.getElementById("plantillapregunta")
        let seccion = document.querySelector("section")
        let pregunta = datos.pregunta[0]
        let importado = document.importNode(plantilla.content,true);
        importado.querySelector("article").setAttribute("name",pregunta.Identificador); 
        importado.querySelector("h3").textContent = pregunta.titulo;
        importado.querySelector("time").textContent = pregunta.fecha;
        importado.querySelector("p").textContent = pregunta.texto;
        seccion.appendChild(importado);
        // Cargo las respuestas
        console.log(datos.respuestas)
        
        let plantilla2 = document.getElementById("plantillarespuesta")
        let respuestas = datos.respuestas
        for(let i = 0;i<respuestas.length;i++){
        let importado = document.importNode(plantilla2.content,true);
            importado.querySelector("article").setAttribute("name",respuestas[i].Identificador); 
            importado.querySelector("time").textContent = respuestas[i].fecha;
            importado.querySelector("p").textContent = respuestas[i].texto;
            seccion.appendChild(importado);
        }
        
        
    })
}
