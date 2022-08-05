window.addEventListener("load", () =>{
    setTimeout(() => {
        document.querySelector(".spin").classList.add("fin");
        
    document.querySelector(".spin").style.display = "none";
        
    }, (1000));
})

const uno = document.querySelector(".uno");
const dos = document.querySelector(".dos");

uno.addEventListener("click", (e) =>{
    e.preventDefault();

    
    document.querySelector(".active").classList.remove("active");

    document.querySelector(".uno").classList.add("active");
    

    document.querySelector(".empresas").classList.remove("active");

    document.querySelector(".empresas").classList.add("inactive");

    document.querySelector(".empleos").classList.add("active");

    document.querySelector(".empleos").classList.remove("inactive");
});

dos.addEventListener("click", (e) =>{
    e.preventDefault();
    
    document.querySelector(".active").classList.remove("active");

    document.querySelector(".dos").classList.add("active");

    document.querySelector(".empleos").classList.remove("active");

    document.querySelector(".empleos").classList.add("inactive");

    document.querySelector(".empresas").classList.add("active");

    document.querySelector(".empresas").classList.remove("inactive");
    
    
});

