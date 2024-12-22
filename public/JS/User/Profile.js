const ORIGIN = document.querySelectorAll(".origin");
const SHOW_CHANGE = document.querySelectorAll(".show-change");

const EDIT = document.getElementById("edit-info");
const SAVE = document.getElementById("save-info");
const SUCCESS = document.getElementById("success-change");
const CANCEL = document.getElementById("cancel");

EDIT.addEventListener("click", () => {
    for (let i = 0; i < SHOW_CHANGE.length; i++) {
        SHOW_CHANGE[i].readOnly = false;
    }
    EDIT.style.display = "none";
    SAVE.style.display = "flex"
    CANCEL.style.display = "flex"
})

CANCEL.addEventListener("click", () => {
    for (let i = 0; i < SHOW_CHANGE.length; i++) {
        SHOW_CHANGE[i].readOnly = false;
    }
    SAVE.style.display = "none"
    CANCEL.style.display = "none"
    EDIT.style.display = "flex";

})

// window.addEventListener('mousemove', () => {
for (let i = 0; i < 5; i++) {
    SHOW_CHANGE[i].addEventListener("input", () => {

        for (let j = 0; j < 5; j++) {
            if (SHOW_CHANGE[j].value !== ORIGIN[j].value && SHOW_CHANGE[j].value != "") {
                SAVE.disabled = false;
                break;
            } else {
                SAVE.disabled = true;
            }
        }
    })
}

disableEnterKey: function disableEnterKey(e) {
    var key;
    if (window.KeyboardEvent)
        key = window.event.keyCode; //IE
    else
        key = e.which; //firefox      

    return (key != 13);
}