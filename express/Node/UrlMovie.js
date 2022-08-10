const axios = require('axios');
const cheerio = require('cheerio');
const fs = require('fs');

const log = console.log;
const code = '81888'

var mysql = require('mysql');
var connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : '506greendg@',
    database : 'whatshow'
});

connection.connect();

connection.query(
    // 'SELECT movie_summary FROM t_movies', function(error, results, filds) {
    //     if(error) {
    //         console.log(error);
    //     }
    //     console.log('')
    // }
    `INSERT INTO t_movies(movie_summary) VALUES(${results}) WHERE movie_code = ${code}`, function(error, results, filds) {
        if(error) {
            console.log(error);
        }
        console.log('')
    }
);

connection.end();

const getHtml = async() => {
    try {
        return await axios.get(`https://movie.naver.com/movie/bi/mi/basic.naver?code=${code}`)
    } catch(error) {
        console.error(error);
    }
};

// img와 summary
getHtml()
.then((html) => {
    const $ = cheerio.load(html.data);
    const data = {
        SummaryTitle: $('#content > div.article > div.section_group.section_group_frst > div:nth-child(1) > div.video > div.story_area > h5.h_tx_story')
        .text(),
        SummaryAll: $('#content > div.article > div.section_group.section_group_frst > div:nth-child(1) > div.video > div.story_area > p.con_tx')
        .text()
    };
    const dataAll = data.SummaryTitle + data.SummaryAll
    return dataAll;
})
.then((res)=>log(res));

console.log(getHtml);


