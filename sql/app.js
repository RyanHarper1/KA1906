const express = require('express');
const mysql = require('mysql');

const app = express();

// Create connection
const db = mysql.createConnection({
    host     : 'localhost',
    user     : 'ryan',
    password : 'password',
    database : 'users'
});

// Connect to db
db.connect((err) => {

    console.log('MySql Connected...');
});

app.on('error', function(err) {
    console.log("[mysql error]",err);
  });

//insert into users
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




app.listen('3000', () => {
    console.log('server started on port 3000');
});