// Função para abrir o popup
function openPopup() {
    document.getElementById("photo-popup").style.display = "flex";
}

// Função para fechar o popup
function closePopup() {
    document.getElementById("photo-popup").style.display = "none";
}

// Variável para armazenar a foto selecionada
let selectedPhoto = "";

// Função para selecionar uma foto
function selectPhoto(photoSrc) {
    // Remove a seleção anterior
    const photos = document.querySelectorAll(".photo-options img");
    photos.forEach(photo => photo.classList.remove("selected"));

    // Adiciona a seleção à foto clicada
    selectedPhoto = photoSrc;
    document.querySelector(`img[src="${photoSrc}"]`).classList.add("selected");
}

// Função para confirmar a seleção
function confirmSelection() {
    if (selectedPhoto) {
        // Altera a foto de perfil
        document.getElementById("icon-perfil").src = selectedPhoto;
        closePopup();
    } else {
        alert("Por favor, selecione uma foto antes de confirmar.");
    }
}

const images = document.querySelectorAll('.photo-options img');

images.forEach((img) => {
    img.addEventListener('click', () => {
        // Remove a classe 'selected' de todas as imagens
        images.forEach((img) => img.classList.remove('selected'));
        // Adiciona a classe 'selected' apenas na imagem clicada
        img.classList.add('selected');
    });
});


//Confete button
        document.querySelector(".classeDoBotão").addEventListener("click", () => {
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 }
            });
        });
        