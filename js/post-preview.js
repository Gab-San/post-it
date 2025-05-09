const bgColorConst = "#ffe278";
const brdColorConst = "#ffad45";

const xOffset = "15";
const dyOffset = 10;
const maxLines = 6;

window.addEventListener("load", function() {
    
    let nameinput = this.document.getElementById("fnameinput");
    nameinput.value = "";
    nameinput.addEventListener("keyup", updatePreviewName);
    
    let form = this.document.forms[0];
    let txtarea = form.getElementsByTagName("textarea")[0];
    txtarea.value = "";
    txtarea.addEventListener("keyup", updatePreviewText);

    let bgColorBtn = this.document.getElementById("fbgcolorsel");
    bgColorBtn.value = bgColorConst;
    bgColorBtn.addEventListener("input", updateBgColor, false);
    
    let brdColorBtn = this.document.getElementById("fbrdcolorsel");
    brdColorBtn.value = brdColorConst;
    brdColorBtn.addEventListener("input", updateBrdColor, false);

    let fntColorBtn = this.document.getElementById("ffntcolorsel");
    fntColorBtn.value = "#000000";
    fntColorBtn.addEventListener("input", updateFntColor, false);
});


function updatePreviewText(event) {
    if(event.key == "Shift" || 
        event.key == "Control") return;
    console.log(event);
    let ctnt = event.target.value;
    let lines = ctnt.split(/\r?\n/g);
    
    let txt = document.getElementById("svg_inner_text");
    let elemNum = txt.children.length;
    for(let count = 0; count < elemNum; count++){
        txt.children[0].remove();
    }

    let fntsz = parseInt(txt.getAttribute("font-size"));
    let dy = fntsz + dyOffset; 

    let count = 0;
    for(el of lines){
        if(count >= maxLines) return;
        let newNode = document.createElementNS("http://www.w3.org/2000/svg" ,"tspan");
        newNode.setAttribute("x", "15");
        newNode.setAttribute("dy", dy.toString());
        newNode.innerHTML = el;
        txt.appendChild(newNode);
        count++;
    }
}

function updatePreviewName(event) {
    if(event.key == "Shift" || event.key == "Control") return;
    let nameTxt = document.getElementById("svg_author_text");
    nameTxt.innerHTML = "By " + event.target.value; 
}

function updateFntColor(event) {
    let txtList = document.getElementById("preview").getElementsByTagName("svg")[0].getElementsByTagName("text");
    console.log("Change font color to: " + event.target.value);
    for(txt of txtList){
        txt.setAttribute("fill", event.target.value);
    }
}

function updateBgColor(event) {
    let bg = document.getElementById("svgbackground");
    console.log("Changed background color to: " + event.target.value);
    bg.style.setProperty("fill", event.target.value);
}

function updateBrdColor(event) {
    let brd = document.getElementById("svgborder");
    console.log("Changed Border Color To: " + event.target.value);
    brd.style.setProperty("fill", event.target.value);
}

function resetPreview() {
    let bg = document.getElementById("svgbackground");
    bg.style.setProperty("fill", bgColorConst);
    let brd = document.getElementById("svgborder");
    brd.style.setProperty("fill", brdColorConst);
}