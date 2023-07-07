// navbr btn
document.querySelectorAll(".menu-btn").forEach((e) => {
    e.addEventListener("click",()=>{
        document.querySelectorAll(".navbar").forEach((e)=> {e.classList.toggle("active");})
    })
})
window.onscroll = function(){
    document.querySelectorAll(".navbar").forEach((e)=> {e.classList.remove("active");})
}


