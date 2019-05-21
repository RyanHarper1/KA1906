const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const http = require('http');
const session = require('express-session');
var bodyParser = require('body-parser');

// create application/json parser

const SESSION_SECRET = "topsecretstuff4323"
const app = express();
app.use(cors());
app.use(bodyParser.json({ extended: true }));

//Sessions to be added later
//app.use(session({
/*name:"lid",
secret: SESSION_SECRET,
resave: false,
saveUninitialized: false,
cookie: {
    httpOnly: true,
    secure: process.env.NODE_ENV === "production",
    maxAge: 1000* 60 * 60 * 24 //1 day
}*/
//})
//);

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
                //req.session.user = result.id;
                res.send({ result: 'true', id: result[0].id, fName: result[0].fName, lName: result[0].lName, email: result[0].email, username: result[0].username, orgId: result[0].orgId })
            } else {
                console.log("incorrect");
                res.send({ result: 'false', message: 'Username or password incorrect' })
            }
        } else {
            res.send({ result: 'false', message: 'User does not exist' });
        }
    });
});

/* Sessions to be added later
app.get('/login', (req, res) => {
    req.session.user ? res.status(200).send({loggedIn: true}) : res.status(200).send({loggedIn: false});
  });
  */

//addscript
app.post('/addscript', (req, res) => {
    let test = req.body;
    let reply = {};

    console.log(test);
    let script = { usersID: req.body.usersID, category: req.body.category, scriptName: req.body.scriptName, subcategory: req.body.subcategory, description: req.body.description };
    let sql = 'INSERT INTO script SET ?';
    console.log("On server side");
    console.log(script);
    let query = db.query(sql, script, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully entered");

            reply = {
                result: 'success', scriptId: result.insertId
            }
        }
        res.send(reply);
    });
});



//addscript questions/pitches
app.post('/addquestion', (req, res) => {
    let test = req.body;
    let reply = {};
    console.log(test);
    let script = { texts: req.body.texts, scriptId: req.body.scriptId };
    let sql = 'INSERT INTO question SET ?';
    console.log("On server side");
    console.log(script);
    let query = db.query(sql, script, (err, result) => {
        if (err) {
            throw err;
        } else {
            //Update Script with First Question ID
            console.log("successfully entered, trying for question");
            let updateScript = 'UPDATE SalesScript.script SET firstQuestionId = ' + result.insertId + ' WHERE scriptId = ' + req.body.scriptId;
            let query2 = db.query(updateScript, (err, result1) => {
                if (err) {
                    throw err;
                } else {
                    console.log(result1);
                }
            });

            reply = {
                result: 'success', questionId: result.insertId
            }
        }
        res.send(reply);
    });
});


//addscript questions/pitches
app.post('/addAnswer', (req, res) => {
    let test = req.body;
    let reply = {};
    console.log(test);
    let script = { texts: req.body.texts, questionId: req.body.questionId };
    let sql = 'INSERT INTO answer SET ?';
    console.log("On server side");
    console.log(script);
    let query = db.query(sql, script, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully entered");

            reply = {
                result: 'success', idanswer: result.insertId
            }
        }
        res.send(reply);
    });
});

//Delete script
app.post('/delete-script', (req, res) => {
    let script = { texts: req.body.texts, questionId: req.body.questionId };
    let sql = 'DELETE FROM script WHERE scriptId  = ' + req.body.scriptId;
    console.log("On server side");
    console.log(script);
    let query = db.query(sql, script, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully deleted");

            reply = {
                result: 'success'
            }
        }
        res.send(reply);
    });
});


app.get('/store', (req, res) => {
    let sql = 'Select * from store'
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/current-scripts', (req, res) => {
    console.log(req.body.id);
    let sql = 'SELECT * FROM script WHERE usersId = ' + req.body.id + ' AND example = "N" AND purchased = "N"';
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.get('/example-scripts', (req, res) => {
    console.log(req.body.id);
    let sql = 'SELECT * FROM script WHERE example = "Y" ';
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/get-script', (req, res) => {
    console.log(req.body.scriptId);
    let sql = 'SELECT * FROM script WHERE scriptId = ' + req.body.scriptId;
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});
app.post('/get-question', (req, res) => {
    console.log(req.body.questionId);
    let sql = 'SELECT * FROM question WHERE questionId = ' + req.body.questionId;
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/get-answer', (req, res) => {
    console.log(req.body.questionId);
    let sql = 'SELECT * FROM answer WHERE questionId = ' + req.body.questionId;
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/upload-script', (req, res) => {
    let sql = 'INSERT INTO store SET ?';
    let values = { usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price, uploadDate: Date.now(), category: req.body.category, rating: 0, question: 0, description: req.body.description }
    let query = db.query(sql, values, (err, result) => {
        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/uploaded', (req, res) => {
    let sql = 'SELECT * FROM store WHERE usersID = ' + req.body.id;
    let query = db.query(sql, (err, result) => {
        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/updateAnswer', (req, res) => {
    console.log('Updated request is: ' + req.body.nextQuestionId + ' + ' + req.body.questionId + ' + ' + req.body.texts);
    let sql = 'UPDATE answer set nextQuestionId = ' + req.body.nextQuestionId + ' WHERE questionId = ' + req.body.questionId + ' AND texts = "' + req.body.texts + '"';
    let query = db.query(sql, (err, result) => {
        if (err) {
            throw err;
        }
        res.send(result);
    });
});

app.post('/orgUsers', (req, res) => {
    let sql = 'SELECT orgId FROM users WHERE id = ' + req.body.id;
    let query = db.query(sql, (err, result) => {
        if (err) {
            throw err;
        }
        console.log(result)
        
        let sql2 = 'SELECT * FROM users WHERE orgId = ' + result[0].orgId;
        let query2 = db.query(sql2, (err, result1) => {
            if (err) {
                throw err;
            }
            console.log('result 2= ' +result1);
            res.send(result1);
        });
    });

});
app.listen('3000', () => {
    console.log('server started on port 3000');
});
