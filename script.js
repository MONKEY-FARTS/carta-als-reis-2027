let listProducts = [];
const listProductHTML = document.querySelector(".content")
function initAPP() {
    fetch('products.json')
        .then(res => res.json())
        .then(data => {
            listProducts = data;
            addDataToHTML();
        });
}

function addDataToHTML() {
    listProducts.forEach(product => {
        let newProduct = document.createElement('div');

        newProduct.classList.add('item');
        newProduct.dataset.id = product.id;

        newProduct.innerHTML = `
            <div class="general" onclick="location.href = 'productes/${product.name}.html'">
                <div class="imagen">
                    <img src="${product.img}">
                </div>
                <div class="descripcion">
                    <h2>${product.name}</h2>
                    <p>${product.description}</p>
                    <h2 class="price">${product.price}€</h2>
                </div>
            </div>
        `;

        listProductHTML.appendChild(newProduct);
    });
}

initAPP();
const body = document.querySelector("#body");
const form = document.querySelector(".form");
const close = document.querySelector(".fa-circle-xmark");

body.addEventListener("click", (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains("fa-circle-plus")) {
        password = parseInt(prompt("Contrasenya:"));

        if (password === 7580) {
            form.style.display = "flex"
        } else {
            form.style.display = "none"
        }
    }
})

close.addEventListener("click", () => {
    form.style.display = "none"
})


const input = document.querySelector("#img");
const preview = document.querySelector("#preview");


input.addEventListener("change", () => {
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
        form.style.top = "60%";
    } else {
        preview.src = "";
        preview.style.display = "none";
        form.style.top = "50%";
    }
})