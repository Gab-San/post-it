var svgPreview;
const bgColorConst = "#ffe278";
const brdColorConst = "#ffad45";


window.addEventListener("load", function() {
    svgPreview =  document.getElementById("preview").getElementsByTagName("svg")[0];

    let form = this.document.forms[0];
    let txtarea = form.getElementsByTagName("textarea")[0];
    txtarea.addEventListener("keyup", updatePreviewText);

    let btnBgColor = this.document.getElementById("fbgcolorsel");
    btnBgColor.value = bgColorConst;
    btnBgColor.addEventListener("input", updateBgColor, false);
    
    let btnBrdColor = this.document.getElementById("fbrdcolorsel");
    btnBrdColor.value = brdColorConst;
    btnBrdColor.addEventListener("input", updateBrdColor, false);
});


function updatePreviewText() {

}

function updateBgColor(event) {
    let bg = svgPreview.getElementById("svgbackground");
    console.log("Changed Background Color To: " + event.target.value);
    bg.style.setProperty("fill", event.target.value);
}

function updateBrdColor(event) {
    let brd = svgPreview.getElementById("svgborder");
    console.log("Changed Border Color To: " + event.target.value);
    brd.style.setProperty("fill", event.target.value);
}

function resetPreview() {
    let bg = svgPreview.getElementById("svgbackground");
    bg.style.setProperty("fill", bgColorConst);
    let brd = svgPreview.getElementById("svgborder");
    brd.style.setProperty("fill", brdColorConst);
}