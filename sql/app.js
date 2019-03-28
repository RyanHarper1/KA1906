const express = require('express');
const mysql = require('mysql');

const app = express();

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
app.post('/test', (req,res) =>{
    console.log('connection')
res.send('working');
});
app.get('/addusers', (req,res) => {
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