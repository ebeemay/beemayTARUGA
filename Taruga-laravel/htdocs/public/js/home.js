window.onload = function () {
    document.getElementById("container1").scrollIntoView({ behavior: 'smooth' });
};

const TarugaBemVindos = document.getElementById('animated');

setTimeout(() => {
    TarugaBemVindos.classList.remove('animatedBackInDown');
    TarugaBemVindos.classList.add('animatedPulse');
}, 2000);

document.getElementById("scrollArrow").addEventListener("click", () => {
    document.getElementById("targetDiv").scrollIntoView({ behavior: 'smooth' });
});


src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"