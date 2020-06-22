const axios = require('axios');
const cheerio = require('cheerio');

const fetchData = async (url) => {
    const result = await axios.get(url)
    return result.data;
}

const main =  async () => {
    
    const content = await fetchData('http://www.finep.gov.br/chamadas-publicas?situacao=aberta');
    const $ = cheerio.load(content);

    let temasArray = [];
    $('div.conteudoChamada').each((i, e) => {

        const tema = $(e).find('.item > h3').attr('href');
        const data = {tema};
        
        temasArray.push(data);
    });
    console.log(temasArray)

};

main();