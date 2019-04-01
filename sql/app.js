const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const http = require('http');
const session = require('express-session');
var bodyParser = require('body-parser');

// create application/json parser


const app = express();
app.use(cors());
app.use(bodyParser.json({ extended: true }));
app.use(session({secret: 'secret'}));

/**bodyParser.json(options)
 * Parses the text as JSON and exposes the resulting object on req.body.
 */
app.use(bodyParser.json());
// Create connection
const db = mysql.createConnection({
    host: '178.128.58.183',
    user: 'user',
    password: 'Welcome1',
    database: 'SalesScript'
});

// Connect to db
db.connect((err) => {

    console.log('MySql Connected...');
});

app.on('error', function (err) {
    console.log("[mysql error]", err);
});


//Register users
app.post('/addusers', (req, res) => {
    let test = req.body;
    let reply = {};
    console.log(test);
    let user = { username: req.body.username, fName: req.body.fName, lName: req.body.lName, email: req.body.email, password: req.body.password };
    let sql = 'INSERT INTO users SET ?';
    console.log("On server side");
    console.log(user);
    let query = db.query(sql, user, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully entered");

            reply = {
                result: 'success', name: req.body.username, fName: req.body.fName, lName: req.body.lName, email: req.body.email
            }
        }
        res.send(reply);
    });

});

//check login
app.post('/login', (req, res) => {
    let user = { username: req.body.email, password: req.body.password };
    let sql = 'SELECT * FROM users WHERE email = ?';
    console.log("On server side");
    console.log(req.body.email);

    let query = db.query(sql, req.body.email, (err, result) => {

        if (err) {
            throw err;
        }

        if (result.length > 0) {
            if (result[0].password == req.body.password) {
                console.log("Authenticated");
                res.send({ result: 'true', id: result[0].id, fName: result[0].fName, lName: result[0].lName, email: result[0].email, username: result[0].username })
            } else {
                console.log("incorrect");
                res.send({ result: 'false', message: 'Username or password incorrect' })
            }
        } else {
            res.send({ result: 'false', message: 'User does not exist' });
        }
    });
});

//addscript
    app.post('/addscript', (req, res) => {
        let test = req.body;
        let reply = {};
        console.log(test);
        let script = { usersId: req.body.usersId, category: req.body.category, scriptName: req.body.scriptName };
        let sql = 'INSERT INTO script SET ?';
        console.log("On server side");
        console.log(script);
        let query = db.query(sql, script, (err, result) => {
            if (err) {
                throw err;
            } else {
                console.log("successfully entered");

                reply = {
                    result: 'success', usersId: req.body.usersId, category: req.body.category, scriptName: req.body.scriptName
                }
            }
            res.send(reply);
        });
    });

    /*addscript questions/pitches
        app.post('/addquestion', (req, res) => {
            let test = req.body;
            let reply = {};
            console.log(test);
            let script = { texts: req.body.texts, scriptId: 101};
            let sql = 'INSERT INTO question SET ?';
            console.log("On server side");
            console.log(script);
            let query = db.query(sql, script, (err, result) => {
                if (err) {
                    throw err;
                } else {
                    console.log("successfully entered");

                    reply = {
                        result: 'success', texts: req.body.texts, scriptId:101
                    }
                }
                res.send(reply);
            });
        });*/


app.get('/store', (req,res) => {
    let sql = 'Select * from store'
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/current-scripts', (req,res) => {
    console.log(req.body.id);
    let sql = 'SELECT * FROM script WHERE usersId = ' + req.body.id + ' AND example = "N" AND purchased = "N"';
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});


app.listen('3000', () => {
    console.log('server started on port 3000');
});
