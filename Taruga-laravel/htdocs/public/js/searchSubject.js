const buttonPT = document.getElementById("animacao");
const buttonLIBRAS = document.getElementById("animacao");

buttonLIBRAS.addEventListener("mouseover", function() {

    this.classList.add("animate__animated", "animate__infinite", "animate__pulse");

});

buttonLIBRAS.addEventListener("mouseout", function() {

    this.classList.remove("animate__pulse");

});

buttonPT.addEventListener("mouseover", function() {

    this.classList.add("animate__animated", "animate__infinite", "animate__pulse");

});

buttonPT.addEventListener("mouseout", function() {

    this.classList.remove("animate__pulse");
    
});