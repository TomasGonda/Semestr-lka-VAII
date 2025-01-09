
/*document.getElementById("registraciaForm").addEventListener("submit", function(event) {
    let email = document.getElementById("email").value;
    let heslo = document.getElementById("password").value;
    let errMsg = document.getElementById("errMsg");

    errMsg.innerHTML = "";

    let err = [];

    let emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(!emailFormat.test(email)) {
        err.push("Zly format mailu");
    }

    if (heslo.length < 6) {
        err.push("Aspon 6 znakov heslo");
    }

    if (err.length > 0) {
        //event.preventDefault();
        errMsg.innerHTML = err.join("<br>");
    }
});*/