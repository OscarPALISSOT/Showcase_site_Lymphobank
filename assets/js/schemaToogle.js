
var Toogle = document.getElementsByClassName("schemaToogle");
var schema = document.getElementsByClassName("schemaDonSteep1");

Toogle.addEventListener("click", function() {
    alert('test');
    schema.classList.add("active");
    if (schema.style.maxHeight) {
    schema.style.maxHeight = null;
    } else {
    schema.style.maxHeight = schema.scrollHeight + "px";
    } 
});
