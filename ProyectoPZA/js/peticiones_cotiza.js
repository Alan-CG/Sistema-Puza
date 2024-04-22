const cbxProducto = document.getElementById('select_nombre')
cbxProducto.addEventListener('change',getPrecio)

const cbxPrecio = document.getElementById('precio_producto')

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

function getPrecio(){
    let producto=cbxProducto.value
    let url = 'model/getPrecio.php'
    let formData = new FormData()
    formData.append('IDproducto',producto) 

    fetchAndSetData(url,formData,cbxPrecio)
}