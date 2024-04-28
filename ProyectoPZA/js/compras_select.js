function updateSelect2() {
    var select1Value = document.getElementById("input_proveedor").value; 

    // Make an AJAX request to a PHP file to get the filtered options for select2
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                var options = JSON.parse(xhr.responseText);
                var select2 = document.getElementById("input_matprim");
                select2.innerHTML = ""; // Clear previous options
                options.forEach(function(option) {
                    var opt = document.createElement("option");
                    opt.value = option.IDmateriaprima;
                    opt.text = option.NombreMateria;
                    select2.appendChild(opt);
                });
                updateInput(); // Update input field when select2 is updated
            } else {
                console.error(xhr.statusText);
            }
        }
    };
    xhr.open("GET", "../model/getMateria_compras.php?select1=" + select1Value, true);
    xhr.send();
}

