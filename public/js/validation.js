(function () {
    "use strict";
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();

var elemento = document.getElementById("date");
var f = new Date();
var dd = parseInt(f.getDate());
var mm = parseInt(f.getMonth()) + 1;
var yy = parseInt(f.getYear()) + 1900;
dd = dd < 10 ? "0" + dd.toString() : dd.toString();
mm = mm < 10 ? "0" + mm.toString() : mm.toString();
var date = yy.toString() + "-" + mm + "-" + dd;
elemento.value = date;
document.getElementById("expiration_date").min = date;
