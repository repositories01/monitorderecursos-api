const axios = require('axios');
const cheerio = require('cheerio');

const fetchData = async (url) => {
    const result = await axios.get(url)
    return result.data;
}

const main =  async () => {
    
    const content = await fetchData('http://www.finep.gov.br/chamadas-publicas?situacao=aberta');   
    const $ = cheerio.load(content);
     let arr = [];
    $('#conteudoChamada .item').each((i, e) => {
        const element = $(e);   
        const tema = element.find(' .tema.div > span:Contains("Tecnologia")').text();
        if(tema){
           const url = element.find('h3 > a').attr('href')
           arr.push({url});

        }

        
    });
    return arr;
};

const teste = async () =>{
  const url =  await main();
  let dados = [];
  const content = url.map( async (e) =>{
      const teste = await fetchData(e.url);
      const $ = cheerio.load(teste);
      let titulo = $('tit_pag > a').text();
      dados.push({titulo});


  })
}
teste();