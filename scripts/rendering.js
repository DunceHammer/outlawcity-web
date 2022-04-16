function getById(id){
    return(document.getElementById(id))
}

function getByClass(className){
    return(document.getElementsByClassName(className));
}

//Intended to be used for swapping between tabs such as inventory/character/etc.
function hideByClass(className, exclude="null") { //"null" instead of null in case of objects with no id
    let tabs = getByClass(className)
    for(let i=0; i<tabs.length; i++){
        if(tabs[i].id != exclude)
            tabs[i].style.display = "none";
    }
}

function showById(id){
    getById(id).style.display = "block";
}

//Not even sure we need this, leaving it in for now
function showByClass(className){
}