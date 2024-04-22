const cbxProveedor = document.getElementById('input_proveedor')
cbxProveedor.addEventListener('change',getMateria)

const cbxMateria = document.getElementById('input_matprim')
cbxMateria.addEventListener('change',getCosto)

const cbxCosto = document.getElementById('input_costo')

function fetchAndSetData(url,formData,targetElement){
    return fetch(url,{
        method: "POST",
        body: formData,
        mode: 'cors'
    })
    .then(response=>response.json())
    .then(data=>{
        targetElement.innerHTML =data
    })
    .catch(err=> console.log(err))
}

function getMateria(){
    let proveedor=cbxProveedor.value
    let url = 'model/getMateria.php'
    let formData = new FormData()
    formData.append('IDproveedor',proveedor) 

    fetchAndSetData(url,formData,cbxMateria)
}

function getCosto(){
    let materia=cbxMateria.value
    let url = 'model/getPrecioCompra.php'
    let formData = new FormData()
    formData.append('IDmateriaprima',materia) 

    fetchAndSetData(url,formData,cbxCosto)
}