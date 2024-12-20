const COMPONENTS_INFO = document.querySelectorAll(".component");
const EDIT = document.getElementById("edit-info");
const SAVE = document.getElementById("save-info");
const SUCCESS = document.getElementById("success-change");
const CANCEL = document.getElementById("cancel");

EDIT.addEventListener("click", () => {
    for (let i = 0; i < COMPONENTS_INFO.length; i++) {
        COMPONENTS_INFO[i].readOnly = false;
    }
    EDIT.style.display = "none";
    SAVE.style.display = "flex"
    CANCEL.style.display = "flex"
})

CANCEL.addEventListener("click", () => {
    for (let i = 0; i < COMPONENTS_INFO.length; i++) {
        COMPONENTS_INFO[i].readOnly = false;
    }
    SAVE.style.display = "none"
    CANCEL.style.display = "none"
    EDIT.style.display = "flex";

})

SAVE.addEventListener("click", () => {
    for (let i = 0; i < COMPONENTS_INFO.length; i++) {
        COMPONENTS_INFO[i].readOnly = true;
    }
    CANCEL.style.display = "none"
    SAVE.style.display = "none";
    SUCCESS.style.display = "flex";


    setTimeout(() => {
        SUCCESS.style.display = "none";
        EDIT.style.display = "flex";
    }, 500);
})