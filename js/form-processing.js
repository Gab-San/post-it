const docForms = document.getElementsByTagName("form");

window.addEventListener("load", function() {
    let form = this.document.getElementsByTagName("form")[0];
    form.addEventListener("reset", resetPHP);
    this.setTimeout(() => resetPHP(), 2000);
})

const profanityFilter = {}

Object.defineProperty(
    profanityFilter,
    "badWords",
    {
        value : ["fuck","she*i+t","ni(g|3)+((e|3)r|a)","negr(o|0)*(n|ne)?(is)?","fi(c|k)a","pene",
            "merda", "ca(z|b)+o", "culo(ne)?", "fottuto", "bastardo",
            "troia", "puttana", "porca"],
        writable : false,
    }
);

Object.defineProperty(
    profanityFilter,
    "badWordsRe",
    {
        value : new RegExp(profanityFilter.badWords.join("|"), "gi"),
        writable : false,
    }
);

function filterProfanity(input) {
    return input.value.replaceAll(profanityFilter.badWordsRe, function(x) {
        var str = "";
        for(i = 0; i < x.length; i++) {
            str += "*";
        }
        return str;
    });  
}

function validateForm() {
    let form = docForms[0];
    let nameIn = form["fnameinput"];
    nameIn.value = filterProfanity(nameIn);
    console.log(nameIn);

    let txtarea = form.getElementsByTagName("textarea")[0];
    txtarea.value = filterProfanity(txtarea);
    console.log(txtarea);
    return true;
}


function resetPHP() {
    let footer = document.getElementsByClassName("webpage-footer")[0];
    footer.innerHTML = "";
}