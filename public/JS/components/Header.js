const ACCOUNT = document.getElementById("account");
if (sessionStorage.getItem["email"] && sessionStorage.getItem["password"]) {
    ACCOUNT.href = "Account"
} else {
    ACCOUNT.href = "Account/Login"
}