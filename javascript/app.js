const faqs = document.querySelectorAll(".faq");

faqs.forEach((faq) => {
    faq.addEventListener("click", () => {
        faq.classList.toggle("active");
    });

});

function redirecionar(){
    location.href = "http://127.0.0.1:5500/Cadastro.html"
}