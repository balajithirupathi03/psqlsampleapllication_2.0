function getData() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/index.php/user/Api/viewHomePageAPI", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    xhttp.onreadystatechange = function() {
        dataArray = JSON.parse(this.responseText);
        for (key in dataArray) {
            dataArray2 = dataArray[key];
            for (key2 in dataArray2) {
                dataArray3 = dataArray2[key2]
                for (key3 in dataArray3) {
                    createProduct(dataArray3);
                }
            }
        }
    }
}

function removeProduct() {
    alert('Dont Touch Me')
}

function createProduct(productDetails) {
    for (key in productDetails) {
        createProtectTable(key, productDetails[key])
    }
    createButton();
}

function createButton() {
    productTable = document.getElementById("productTable")
    row = document.createElement('tr');
    button = document.createElement('input');
    button.type = "button";
    button.value = 'Remove / Buy';
    // button.onclick = "removeProduct()";
    cell1 = row.insertCell(0);
    cell1.appendChild(button)
    row.insertCell(cell1);
    cell2 = row.insertCell(0);
    cell2.innerHTML = '-----'
    productTable.appendChild(row);
    productTable.appendChild(document.createElement('tr'));
}

function createProtectTable(fieldName, fieldValue) {
    productTable = document.getElementById("productTable")
    if (fieldName == 'productid') {
        buttonId = fieldValue;
    } else {
        var row = document.createElement('tr');
        cell1 = row.insertCell(0);
        cell1.innerHTML = fieldName;
        cell2 = row.insertCell(0);
        cell2.innerHTML = fieldValue;
        productTable.appendChild(row);
    }
}