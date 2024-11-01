window.addEventListener('load', function() {
  const cidadeSelect = document.getElementById('cidade2');
  const mapIframe = document.getElementById('map-iframe');
  cidadeSelect.addEventListener('change', () => {
    const cidadeSelecionada = cidadeSelect.value;
    if (cidadeSelecionada === 'São Paulo') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d165508.80460572938!2d-46.607754164980825!3d-23.559016109593454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20S%C3%A2o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1730416140804!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Guarulhos') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d82834.00936965171!2d-46.48829920274887!3d-23.432291098815426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Guarulhos!5e0!3m2!1spt-BR!2sbr!4v1730416396423!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Campinas') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d69939.06278726934!2d-47.07159762594168!3d-22.886829138926952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1730416649269!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'São Bernardo do Campo') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58456.4983095379!2d-46.56514884132966!3d-23.692719364514026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20S%C3%A3o%20Bernardo%20do%20Campo!5e0!3m2!1spt-BR!2sbr!4v1730416912060!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Santo André') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d49164.796513946836!2d-46.51124224493021!3d-23.668970522659297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Santo%20Andr%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1730417047838!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Osasco') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d41385.845334065496!2d-46.78673486042421!3d-23.531549804473517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Osasco!5e0!3m2!1spt-BR!2sbr!4v1730417352955!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Sorocaba') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d49238.5593278943!2d-47.46991575077896!3d-23.47208325075374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Sorocaba!5e0!3m2!1spt-BR!2sbr!4v1730417548073!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Ribeirão Preto') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29765.746141962554!2d-47.8126997077878!3d-21.163607362790117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Ribeir%C3%A3o%20Preto!5e0!3m2!1spt-BR!2sbr!4v1730417651795!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Mongaguá') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d48998.91866930557!2d-46.662548190822044!3d-24.106192636635683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Mongagu%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1730417705776!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Praia Grande') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58311.707638120904!2d-46.464061411194976!3d-24.01407202262177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Praia%20Grande!5e0!3m2!1spt-BR!2sbr!4v1730417766027!5m2!1spt-BR!2sbr';
    } else if (cidadeSelecionada === 'Santos') {
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29168.530707788774!2d-46.324330897967755!3d-23.958094209411048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stodas%20as%20assist%C3%AAncia%20t%C3%A9cnicas%20em%20toda%20a%20cidade%20de%20Santos!5e0!3m2!1spt-BR!2sbr!4v1730417805895!5m2!1spt-BR!2sbr';
    } else {
      // Default to a generic map of São Paulo
      mapIframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176279.441374688!2d-51.09423667530317!3d-22.40173287239382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce597d462f58ad%3A0x1e5241e2e17b7c17!2sS%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1729128429112!5m2!1spt-BR!2sbr';
    }
  });
});


const descarteBTN = document.getElementById('descarte-btn');
const assistenciaBTN = document.getElementById('suporte-btn');
const select1 = document.getElementById('cidade1');
const select2 = document.getElementById('cidade2');
const title = document.getElementById('title');

select1.style.display = 'block';
select2.style.display = 'none';

descarteBTN.addEventListener('click', () => {
  select1.style.display = 'block';
  select2.style.display = 'none';  
  title.innerText = 'Pontos de Descarte';
});

assistenciaBTN.addEventListener('click', () => {
  select1.style.display = 'none';  
  select2.style.display = 'block';
  title.innerText = 'Assistências Técnicas';
});