<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Cropper.js</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link href="/js/cropper-js/cropper.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <form class="form">
        <div class="mb-3">
            <label for="file-upload" class="form-label">Upload Images</label><br/>
            <input type="file" id="file-upload" class="image">
        </div>
    </form>
    <!-- en este img se mostrará el archivo despues de haberlo subido-->
    <img src="#" id="img-uploaded" style="visibility: hidden;" class="img-fluid" />
    <!-- en este span se visualizará la url del archivo-->
    <span id="span-uploaded"></span>
</div>
<div class="modal fade" id="div-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- en este img se visualizará todo el archivo seleccionado-->
                            <img id="img-original" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <!-- en este div se mostrará la zona seleccionada, lo que quedará despues de hacer click en el boton crop-->
                            <div id="div-preview" class="preview img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
img {
    display: block;
    max-width: 100%;
}
.preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid #0B5ED7;
}
</style>
<script src="/js/cropper-js/cropper.js"></script>
<script type="module">
    //este código lo pongo más abajo
</script>
</body>
</html>

<script type="text/javascript">
    
    //$ es una convención de js que indica que esa variable es un elemento html, se puede declarar sin $

//file es input de selección
const $file = document.getElementById("file-upload")
//es elemento img dentro del modal donde se montará la imagen seleccionada
const $image = document.getElementById("img-original")

const $modal = document.getElementById("div-modal")

//si deseamos interactuar con el modal usando los metodos nativos de bootstrap5
//debemos construirlo pasando el elemento. En nuestro caso .show() y .hide()
const objmodal = new bootstrap.Modal($modal, {
    //que el modal no interactue con el teclado
    keyboard: false
})

//escuchamos el change del input-file
$file.addEventListener("change", function (e) {
    const load_image = function (url){
        $image.src = url
        objmodal.show()
    }

    const files = e.target.files

    if(files && files.length>0) {
        const objfile = files[0]
        //el objeto file tiene las propiedades: name, size, type, lastmodified, lastmodifiedate
        
        //para poder visualizar el archivo de imagen lo debemos pasar a una url 
        //el objeto URL está en fase experimental así que si no existe usaria FileReader
        if (URL){
            //crea una url del estilo: blob:http://localhost:1024/129e832d-2545-471f-8e70-20355d8e33eb
            const url = URL.createObjectURL(objfile)
            load_image(url)
        }
        else if (FileReader) {
            const reader = new FileReader()
            reader.onload = function (e) {
                load_image(reader.result)
            }
            reader.readAsDataURL(objfile)
        }
    }
})//file.on-change

const $btncrop = document.getElementById("btn-crop")
//configuramos el click del boton crop
$btncrop.addEventListener("click", function (){
    //obtenemos la zona seleccionada
    const canvas = cropper.getCroppedCanvas()

    canvas.toBlob(function (blob){
        //el objeto blob (binary larege object) tiene las propiedades: size y type
        const reader = new FileReader()
        //se pasa el binario base64
        reader.readAsDataURL(blob)

        reader.onloadend = function (){
            const base64data = reader.result
            //base64data es un string del tipo: data:image/png;base64,iVBORw0KGgoAAAA....
            console.log("base64data", base64data)
            //en mi caso estoy trabajando con php en el back pero puede ser cualquier url
            const url = "/index.php?f=crop_first&nohome=1"

            fetch(url, {
                method: "POST",
                headers: {
                    //si la respuesta del servidor no es un json saltará una excepción en js
                    "Accept": "application/json",
                    //le indica al servidor que se le enviará un json
                    "Content-Type": "application/json"
                },

                body: JSON.stringify({
                    image: base64data
                })
            })
            .then(response => response.json())
            .then(function (result){
                $file.value = ""    //resetea el elemento input-file (file-upload)
                objmodal.hide()     //escondo el modal
                //result es algo como: {message:"image uploaded successfully.", file:"upload/uuid.png"}
                alert(result.message)

                //este es el img que está debajo del elemnto input-file
                const $img = document.getElementById("img-uploaded")
                $img.src = "/"+result.file
                $img.style.visibility = "visible"

                const $span = document.getElementById("span-uploaded")
                $span.innerText=$img.src
            })
        }//reader.on-loaded
    })//canvas.toblob
})//btncrop.on-click

//el objeto cropper que habrá que crearlo y destruirlo. 
//Crearlo al mostrar el modal y destruirlo al cerrarlo
let cropper = null
$modal.addEventListener("shown.bs.modal", function (){
    console.log("modal.on-show")
    //crea el marco de selección sobre el objeto $image
    cropper = new Cropper($image, {
        //donde se mostrará la parte seleccionada
        preview: document.getElementById("div-preview"),
        //3: indica que no se podrá seleccionar fuera de los límites
        viewMode: 3,
        //NaN libre elección, 1 cuadrado, proporción del lado horizontal con respecto al vertical
        aspectRatio: 1.5,
    })
})//modal.on-shown

$modal.addEventListener("hidden.bs.modal", function (){
    console.log("modal.on-hide")
    cropper.destroy()
    cropper = null
})//modal.on-hidden    
    
</script>