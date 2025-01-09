//-----------------get from session-----------------
function productsSessionGet() {
    return JSON.parse(sessionStorage.getItem("products"));
}

//-----------------set to session-----------------
function productsSessionSet(data) {
    return sessionStorage.setItem("products", JSON.stringify(data));
}



//-----------------show-----------------
function addElement(list) {
    if (list.length == 0) {
        DISPLAY.innerHTML = ``;
    } else {
        let innerHTML = "";
        for (let i = 0; i < list.length; i++) {
            let product = list[i];
            innerHTML += `
                <div class = "col-3 col-md-3 mb-4">
                    <div class="card">
                        <img src="${product[6]}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">${product[2]}</h5>
                            <p class="card-text">${product[7]}</p>
                            <p class="card-text">
                                <span style="color: #FF0000;">${product[4]} VNĐ</span>
                                <span style="text-decoration: line-through;">${product[3]} VNĐ</span>
                            </p>
                            <a href='Product/Detail/${  [0]}' class='btn btn-primary'>View Details</a>
                        </div>
                    </div>
                </div>
            `
        }
        DISPLAY.innerHTML = innerHTML;
    }

}

//-----------------filter by type -----------------
function filterByType(category, list) {
    let result = [];
    for (let i = 0; i < list.length; i++) {
        let product = list[i];
        if (category == "all") {
            result = list;
            break;
        } else if (product[1] == category) {
            result.push(product);
        }
    }
    return result;
}

//-----------------filter by Price -----------------
function filterByPrice(price, list) {
    let result = [];
    for (let i = 0; i < list.length; i++) {
        let product = list[i];
        if (price == "1" && (product[4] < 100000)) {
            result.push(product);
        } else if (price == "2" && (product[4] >= 100000 && product[4] < 300000)) {
            result.push(product);
        } else if (price == "3" && (product[4] >= 300000 && product[4] < 500000)) {
            result.push(product);
        } else if (price == "4" && (product[4] >= 500000 && product[4] < 1000000)) {
            result.push(product);
        } else if (price == "5" && (product[4] >= 1000000)) {
            result.push(product);
        } else if (price == "0") {
            result = list;
            break;
        }
    }
    return result;
}

//-----------------sort-----------------
function lowToHigh(list) {
    return list.toSorted((a, b) => {
        return a[4] - b[4]
    })
}

function highToLow(list) {
    return list.toSorted((a, b) => {
        return b[4] - a[4]
    })
}

function sort(type, list) {
    if (type == "lowToHigh") {
        products = lowToHigh(list);
    } else if (type == "highToLow") {
        products = highToLow(list);
    } else {
        products = list;
    }
    addElement(products);
}

//---------------------------------------------------
const VALUE = document.querySelectorAll(".value");
const DISPLAY = document.getElementById("display");

let products = [];

//set to session
for (let i = 0; i < VALUE.length; i++) {
    let element = VALUE[i].innerText.split(";");
    products.push(element);
}

productsSessionSet(products);


addElement(products);

//filter
const PRICE = document.getElementById("filterByPrice");
const TYPE = document.getElementById("filterByType");
const SORT = document.getElementById("sortByPrice");

////-------------------------action--------------------------
PRICE.addEventListener("change", () => {
    products = filterByType(TYPE.value, productsSessionGet());
    products = filterByPrice(PRICE.value, products);
    sort(SORT.value, products);

})

TYPE.addEventListener("change", () => {
    products = filterByPrice(PRICE.value, productsSessionGet());
    products = filterByType(TYPE.value, products);
    sort(SORT.value, products);
})

SORT.addEventListener("change", () => (sort(SORT.value, products)));