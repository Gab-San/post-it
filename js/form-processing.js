const docForms = document.getElementsByTagName("form");

window.addEventListener("load", function() {
    let form = this.document.getElementsByTagName("form")[0];
    form.addEventListener("reset", resetPHP);
    this.setTimeout(() => resetPHP(), 2000);
})

function printForm() {
    let form = docForms[0];
    console.log(form);
    console.log(form["fnameinput"].value);
    console.log(form["fbgcolorsel"].value);
    console.log(form["fbrdcolorsel"].value);
    console.log(form["ffntcolorsel"].value);
    let txt = form.getElementsByTagName("textarea")[0].value;
    console.log(txt);
    let lines = txt.split(/\r?\n/g);
    console.log(lines);
    return true;
}

function resetPHP() {
    let footer = document.getElementsByClassName("webpage-footer")[0];
    footer.innerHTML = "";
}