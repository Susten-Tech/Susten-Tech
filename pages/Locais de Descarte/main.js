window.addEventListener('load', function() {
    const cidadeSelect = document.getElementById('cidade1');
    const mapIframe = document.getElementById('map-iframe');
    cidadeSelect.addEventListener('change', () => {
      const cidadeSelecionada = cidadeSelect.value;
      if (cidadeSelecionada === 'São Paulo') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d165455.56957491435!2d-46.59751861493792!3d-23.60124485356628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20S%C3%A3o%20paulo!5e0!3m2!1spt-BR!2sbr!4v1729128609993!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Guarulhos') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d69652.14209749638!2d-46.50219107613986!3d-23.437375907079378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Guarulhos!5e0!3m2!1spt-BR!2sbr!4v1729128846005!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Campinas') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d143950.360632797!2d-47.08155690421333!3d-22.9118030051323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1729129077799!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'São Bernardo do Campo') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d85076.40688903954!2d-46.560531776630356!3d-23.717228180176587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20S%C3%A3o%20Bernardo%20do%20Campo!5e0!3m2!1spt-BR!2sbr!4v1729129245865!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Santo André') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d41343.05977253363!2d-46.51993339769972!3d-23.667204206259893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20em%20santo%20andr%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1729299643051!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Osasco') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d41386.394276586216!2d-46.782185083240144!3d-23.529804555751014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Osasco!5e0!3m2!1spt-BR!2sbr!4v1729299723554!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Sorocaba') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d47834.77653060518!2d-47.45934844306891!3d-23.477756156988004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Sorocaba!5e0!3m2!1spt-BR!2sbr!4v1729299782268!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Ribeirão Preto') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d70782.24077058368!2d-47.8001391951776!3d-21.19083675151958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Ribeir%C3%A3o%20Preto!5e0!3m2!1spt-BR!2sbr!4v1729299858906!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Mongaguá') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d47609.18383642496!2d-46.65779298242935!3d-24.092285026598013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Mongagu%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1729299926399!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Praia Grande') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d82454.74236117743!2d-46.49375374683198!3d-24.03038750351105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Praia%20Grande!5e0!3m2!1spt-BR!2sbr!4v1729300288057!5m2!1spt-BR!2sbr';
      } else if (cidadeSelecionada === 'Santos') {
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d41252.084313891755!2d-46.334054478250934!3d-23.95324060664831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slocais%20de%20descarte%20na%20cidade%20de%20Santos!5e0!3m2!1spt-BR!2sbr!4v1729300337058!5m2!1spt-BR!2sbr';
      } else {
        // Default to a generic map of São Paulo
        mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176279.441374688!2d-51.09423667530317!3d-22.40173287239382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce597d462f58ad%3A0x1e5241e2e17b7c17!2sS%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1729128429112!5m2!1spt-BR!2sbr';
      }
    });
  });

