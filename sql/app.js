const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const http = require('http');
var bodyParser = require('body-parser');

// create application/json parser


const app = express();
app.use(cors());
app.use(bodyParser.json({extended : true}));

/**bodyParser.json(options)
 * Parses the text as JSON and exposes the resulting object on req.body.
 */
app.use(bodyParser.json());
// Create connection
const db = mysql.createConnection({
    host     : '178.128.58.183',
    user     : 'user',
    password : 'Welcome1',
    database : 'SalesScript'
});

// Connect to db
db.connect((err) => {

    console.log('MySql Connected...');
});

app.on('error', function(err) {
    console.log("[mysql error]",err);
  });

//Register users
app.get('/test', (req,res) =>{
    console.log('connection')
    const test = [
        {id: 1, name: 'test'}
    ];
    res.send(test);
});



app.post('/addusers', (req,res) => {
    let test = req.body;
    console.log(test);
    console.log(String(req.body.fName));
    let user = {username: req.body.username, fName: req.body.fName, lName: req.body.lName, email: req.body.email, password: req.body.password};
    let sql = 'INSERT INTO users SET ?';
    console.log("On server side");
    console.log(user);
    let query = db.query(sql,user, (err, result) => {
        console.log("2");

        if(err){
            throw err;
        }else{
            console.log("successfully entered");
        }
        res.send(result);
    });

});

//check login
app.get('/login', (req,res) => {
    let user = {fName: 'Ryan', lName:'Harper', email:'ryan@mail.com', password: 'password'};
    let sql = 'INSERT INTO users SET ?';
    console.log("On server side");
    console.log(user);
    let query = db.query(sql,user, (err, result) => {
        console.log("2");

        if(err){
            throw err;
        }
        console.log(result);
        res.send('users added');
    });

});




app.listen('3000', () => {
    console.log('server started on port 3000');
});