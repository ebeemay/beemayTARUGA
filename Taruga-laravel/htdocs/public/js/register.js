
    // Função para aplicar máscara no CNPJ
    function aplicarMascaraCNPJ(cnpj) {
        return cnpj
            .replace(/\D/g, '') // Remove tudo que não é número
            .replace(/^(\d{2})(\d)/, '$1.$2') // Adiciona o primeiro ponto
            .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3') // Adiciona o segundo ponto
            .replace(/\.(\d{3})(\d)/, '.$1/$2') // Adiciona a barra
            .replace(/(\d{4})(\d)/, '$1-$2'); // Adiciona o hífen
    }

    // Função para aplicar máscara no Telefone
    function aplicarMascaraTelefone(telefone) {
        return telefone
            .replace(/\D/g, '') // Remove tudo que não é número
            .replace(/^(\d{2})(\d)/g, '($1) $2') // Adiciona o DDD
            .replace(/(\d{4,5})(\d{4})$/, '$1-$2'); // Adiciona o hífen
    }

    // Eventos para aplicar a máscara enquanto o usuário digita
    document.getElementById('cnpj').addEventListener('input', function (e) {
        e.target.value = aplicarMascaraCNPJ(e.target.value);
    });

    document.getElementById('telefone').addEventListener('input', function (e) {
        e.target.value = aplicarMascaraTelefone(e.target.value);
    });
