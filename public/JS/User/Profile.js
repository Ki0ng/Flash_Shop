const FORM_POST = document.querySelectorAll(".form_post");
const FORM_SHOW = document.querySelectorAll(".form_show");

const EDIT = document.getElementById("edit-info");
const SAVE = document.getElementById("save-info");
const SUCCESS = document.getElementById("success-change");
const CANCEL = document.getElementById("cancel");

const ORIGIN = [
    FORM_POST[0].value,
    FORM_POST[1].value,
    FORM_POST[2].value,
    FORM_POST[3].value,
]

EDIT.addEventListener("click", () => {
    EDIT.style.display = "none";
    SAVE.style.display = "flex"
    CANCEL.style.display = "flex"
    for (let i = 0; i < FORM_SHOW.length; i++) {
        FORM_SHOW[i].readOnly = false;
    }
})

CANCEL.addEventListener("click", () => {
    SAVE.style.display = "none"
    CANCEL.style.display = "none"
    EDIT.style.display = "flex";
    for (let i = 0; i < FORM_SHOW.length; i++) {
        FORM_SHOW[i].readOnly = true;
    }
})

for (let i = 0; i < FORM_SHOW.length; i++) {
    FORM_SHOW[i].addEventListener("input", () => {
        for (let j = 0; j < FORM_POST.length; j++) {
            if (FORM_SHOW[j].value !== ORIGIN[j] && FORM_SHOW[j] != "") {
                FORM_POST[j].value = FORM_SHOW[j].value
                SAVE.disabled = false;
                break;
            } else {
                SAVE.disabled = true;
            }
        }
    })
}

document.getElementById('logout').addEventListener("click", () => {
    window.location = "/Flash_Shop/User/Logout"
    window.location = "/Flash_Shop"
});