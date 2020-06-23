const axios = require('axios');
const cheerio = require('cheerio');

const fetchData = async (url) => {
    const result = await axios.get(url)
    return result.data;
}

const main = async () => {

    const content = await fetchData('http://www.finep.gov.br/chamadas-publicas?situacao=aberta');
    let  $ = cheerio.load(content);
    let arr = [];
    $('#conteudoChamada .item').each((i, e) => {
        const element = $(e);
        const tema = element.find(' .tema.div > span:Contains("Tecnologia")').text();
       
        if (tema) {
            const url = 'http://www.finep.gov.br' + element.find('h3 > a').attr('href')
            arr.push({url})
                 var res = await fetchData(url)
            

             $ = cheerio.load(res)
             console.log($)

            }
       

        

    });


};