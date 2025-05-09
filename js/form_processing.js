const docForms = document.getElementsByTagName("form");

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
    return false;
}