const cbxProveedor = document.getElementById('input_proveedor')
cbxProveedor.addEventListener('change',getMateria)

const cbxMateria = document.getElementById('input_matprim')

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