const PRODUCT_NAME = document.querySelectorAll(".category-name");
const HAS = document.querySelectorAll(".has");
const STOCK = document.querySelectorAll(".stock");
const SOLD = document.querySelectorAll(".sold");
const INFO = document.querySelectorAll(".info");

for (let i = 0; i < HAS.length; i++) {

    PRODUCT_NAME[i].addEventListener("mouseover", () => {
        INFO[i].innerHTML = "product name";
    });

    HAS[i].addEventListener("mouseover", () => {
        INFO[i].innerHTML = "in stock";
    });

    STOCK[i].addEventListener("mouseover", () => {
        INFO[i].innerHTML = "total stock";
    });

    SOLD[i].addEventListener("mouseover", () => {
        INFO[i].innerHTML = "total revenue";
    });

    PRODUCT_NAME[i].addEventListener("mouseout", () => {
        INFO[i].innerHTML = "...";
    });

    HAS[i].addEventListener("mouseout", () => {
        INFO[i].innerHTML = "...";
    });

    STOCK[i].addEventListener("mouseout", () => {
        INFO[i].innerHTML = "...";
    });

    SOLD[i].addEventListener("mouseout", () => {
        INFO[i].innerHTML = "...";
    });
}