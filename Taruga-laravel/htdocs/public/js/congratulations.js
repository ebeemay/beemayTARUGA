        const continueButton = document.getElementById('continueButton');
        continueButton.addEventListener('click', () => {
            window.location.href = 'préAtividadeAlfabeto.html'; // Substitua 'outraPagina.html' pela URL desejada
        });
        //Confetti button
        document.getElementsByClassName("imgTrofeu")[0].addEventListener("click", () => {
            confetti();
        });

        let x1 = 0, y1 = 0;

        const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0),
            dist_to_draw = 50,
            delay = 1000,
            fsize = ['1.1rem', '1.4rem', '.8rem', '1.7rem'],
            colors = ['#E23636', '#F9F3EE', '#E1FBDC', '#BBAFE6', '#AEE1CD', '#5E80E5'],
            rand = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min,
            selRand = (o) => o[rand(0, o.length - 1)], // Corrigido "lenght" para "length"
            distanceTo = (x1, y1, x2, y2) => Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2)),
            shouldDraw = (x, y) => distanceTo(x1, y1, x, y) > dist_to_draw,
            addStr = (x, y) => {
                const str = document.createElement("div");
                str.innerHTML = '&#10022';
                str.className = 'star';
                str.style.top = `${y + rand(-20, 20)}px`; // Corrigido a interpolação
                str.style.left = `${x}px`;
                str.style.color = selRand(colors);
                str.style.fontSize = selRand(fsize);
                document.body.appendChild(str);

                // Ajuste o cálculo da font-size conforme necessário
                const fs = parseFloat(getComputedStyle(str).fontSize);

                setTimeout(() => {
                    str.remove();
                }, delay);
            };

        addEventListener("mousemove", (e) => {
            const { clientX, clientY } = e;
            if (shouldDraw(clientX, clientY)) {
                addStr(clientX, clientY);
                x1 = clientX;
                y1 = clientY;
            }
        });