document.addEventListener("DOMContentLoaded",()=>{
    let success = document.getElementById('success');
    let remove = document.getElementById('delete');
    let update = document.getElementById('update');
    
    if(remove){
        setTimeout(()=>{
            remove.style.display = "none";
        },2000);
    }
    if(success){
        setTimeout(()=>{
            success.style.display = "none";
        },2000);
    }
    if(update){
        setTimeout(()=>{
            update.style.display = "none";
        },2000);
    }

});

// console.log("Hellow");