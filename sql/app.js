const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const http = require('http');
const session = require('express-session');
var bodyParser = require('body-parser');
const crypto = require('crypto');
// create application/json parser
const secret = 'pmiafidc36d'
const SESSION_SECRET = "topsecretstuff4323"
const app = express();
app.use(cors());
app.use(bodyParser.json({ extended: true }));

//sessions to be added later
app.use(session({
    name: "lid",
    secret: SESSION_SECRET,
    resave: false,
    saveUninitialized: false,
    cookie: {
        httpOnly: true,
        secure: process.env.NODE_ENV === "production",
        maxAge: 1000 * 60 * 60 * 24 //1 day
    }
})
);

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
    let hash = crypto.createHash('sha512').update(req.body.password).digest('hex');


    let test = req.body;
    let reply = {};
    console.log(test);
    let user = { fName: req.body.fName, lName: req.body.lName, email: req.body.email, password: hash };
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
app.post('/newOrgUser', (req, res) => {
    let hash = crypto.createHash('sha512').update(req.body.password).digest('hex');


    let test = req.body;
    let reply = {};
    console.log(test);
    let user = { fName: req.body.fName, lName: req.body.lName, email: req.body.email, password: hash,orgId:req.body.orgId,admin:req.body.admin };
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
            let hash = crypto.createHash('sha512').update(req.body.password).digest('hex');
            if (result[0].password == hash) {
                console.log("Authenticated");
                //req.session.user = result.id;
                res.send({ result: 'true', id: result[0].id, fName: result[0].fName, lName: result[0].lName, email: result[0].email, username: result[0].username, orgId: result[0].orgId ,admin:result[0].admin})
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

app.post('/updatescripttime', (req, res) => {

     let sql = 'UPDATE script SET edited = curdate() WHERE scriptId = ' + req.body.scriptId

    console.log(sql);
    let query = db.query(sql, (err, result) => {
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


app.post('/updateOrgUser', (req, res) => {

    let sql = 'UPDATE users SET admin = "' + req.body.admin + '" WHERE id = ' + req.body.id

   console.log(sql);
   let query = db.query(sql, (err, result) => {
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
        }
        reply = {
            result: 'success', questionId: result.insertId
        }
        res.send(reply);
    });


});





app.post('/addFirstQuestion', (req, res) => {
    console.log('ADD FIRST QUESTION');
    let test = req.body;
    let reply = {};
    console.log(test);
    let script = { texts: req.body.texts, scriptId: req.body.scriptId };
    let sql = 'INSERT INTO question SET ?';
    console.log("On server side first");
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
                    res.send({ questionId: result.insertId })
                }
            });

        }

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

app.post('/editAnswer', (req, res) => {

    let test = req.body;
    let reply = {};
    console.log(test);

    let script = { texts: req.body.texts, questionId: Number(req.body.questionId), nextQuestionId: req.body.nextQuestionId };
    if (Number(script.nextQuestionId < 1)) {
        script.nextQuestionId = null
    }
    let sql = 'INSERT INTO answer SET ?';
    console.log(sql + script);
    console.log(script);
    let query = db.query(sql, script, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log(result);

            reply = {
                result: 'success', idanswer: result.insertId
            }
            res.send(reply);
        }

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

app.post('/deleteOrgScript', (req, res) => {
   let sql = 'DELETE FROM orgScripts WHERE scriptId  = ' + req.body.scriptId;
    console.log(sql);

    let query = db.query(sql, (err, result) => {
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
app.post('/deleteOrgUser', (req, res) => {
    let sql = 'DELETE FROM users WHERE id  = ' + req.body.id;
     console.log(sql);
 
     let query = db.query(sql, (err, result) => {
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

app.post('/deleteUploadedScript', (req, res) => {
    let script = { texts: req.body.texts, questionId: req.body.questionId };
    let sql = 'DELETE FROM store WHERE scriptID  = ' + req.body.scriptId;
    console.log("On server side");
    console.log(sql);
    let query = db.query(sql, (err, result) => {
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
//Delete cart Item
app.post('/delete-item', (req, res) => {
    let cart = { storeID: req.body.storeID, usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price, description: req.body.description, rating: req.body.rating, uploadDate: req.body.uploadDate, category: req.body.category };
    let sql = 'DELETE FROM cart WHERE cartID  = ' + req.body.cartID;
    console.log("On server side");
    console.log(cart);
    let query = db.query(sql, cart, (err, result) => {
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


//add cart item
app.post('/add-item', (req, res) => {
    let reply = {};
    let store = {
        storeID: req.body.storeID, usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price,
        description: req.body.description, rating: req.body.rating, uploadDate: req.body.uploadDate, category: req.body.category
    };
    let sql = 'INSERT INTO cart SET ?';
    console.log("On server side");
    console.log(store);
    let query = db.query(sql, store, (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully added");

            reply = {
                result: 'success', idanswer: result.insertId
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

//load cart
app.post('/cart', (req, res) => {
    console.log(req.body.id);
    let sql = 'SELECT * FROM cart WHERE usersId = ' + req.body.id;
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
app.post('/purchased-scripts', (req, res) => {
    console.log(req.body.id);
    let sql = 'SELECT * FROM PayPal WHERE usersID = ' + req.body.id;
    let query = db.query(sql, (err, result) => {
        console.log(sql)
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
        console.log(result)
        res.send(result);
    });
});
app.post('/get-question', (req, res) => {
    console.log(req.body.questionId);
    let sql = 'SELECT * FROM question WHERE questionId = ' + Number(req.body.questionId);
    console.log(sql);
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
    let check = "SELECT * FROM store WHERE scriptID = " + req.body.scriptID
    let execute = db.query(check, (err, result) => {
        if (result == null) {
            console.log('No current entries')
            let sql = 'INSERT INTO store SET ?';
            let values = { usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price, uploadDate: req.body.uploadDate, question: req.body.question, category: req.body.category, rating: 0, description: req.body.description, subCategory: req.body.subCategory }
            let query = db.query(sql, values, (err, result) => {
                if (err) {
                    throw err;
                }
                res.send(result);
            });
        } else {
            console.log('Entry exists. Removing then reuploading')
            let query2 = "DELETE FROM store WHERE scriptID = " + req.body.scriptID
            let execute2 = db.query(query2, (err, result) => {
                let sql = 'INSERT INTO store SET ?';
                let values = { usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price, uploadDate: req.body.uploadDate, question: req.body.question, category: req.body.category, rating: 0, description: req.body.description, subCategory:req.body.subCategory }
                let query3 = db.query(sql, values, (err, result) => {
                    if (err) {
                        throw err;
                    }
                    res.send(result);
                });
            });
        }

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
            console.log('result 2= ' + result1);
            res.send(result1);
        });
    });

});

app.post('/get-orgscripts', (req, res) => {
    let sql = 'SELECT * FROM orgScripts WHERE orgId = ' + req.body.orgId;
    let query = db.query(sql, (err, result) => {
        if (err) {
            throw err;
        }
        console.log(result);
        res.send(result);
    });

});
app.post('/sharescript', (req, res) => {
    let sql = 'INSERT INTO orgScripts SET ?'
    let script = {scriptId:req.body.scriptId, orgId: req.body.orgId}
    let query = db.query(sql,script, (err, result) => {
        if (err) {
            throw err;
        }
        console.log(result);
        res.send(result);
    });

});

app.listen('3000', () => {
    console.log('server started on port 3000');
});


//get storeID
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

//Clear Cart
app.post('/clear-cart', (req, res) => {
    let cart = { storeID: req.body.storeID, usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price, description: req.body.description, rating: req.body.rating, uploadDate: req.body.uploadDate, category: req.body.category };
    let sql = 'DELETE FROM cart WHERE usersID  = ' + req.body.usersID;
    console.log("On server side");
    console.log(cart);
    let query = db.query(sql, [cart], (err, result) => {
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

//cart paid
app.post('/payment-details', (req, res) => {
    let reply = {};
    let paid = {
        storeID: req.body.storeID, usersID: req.body.usersID, scriptID: req.body.scriptID, scriptName: req.body.scriptName, price: req.body.price,
        description: req.body.description, rating: req.body.rating, uploadDate: req.body.uploadDate, category: req.body.category
    };
    let sql = 'INSERT INTO PayPal SET ?';
    console.log("On server side");
    console.log(paid);
    let query = db.query(sql, [paid], (err, result) => {
        if (err) {
            throw err;
        } else {
            console.log("successfully added");

            reply = {
            }
        }
        res.send(reply);
    });
});

app.post('/update-script', (req, res) => {
    let sql = 'UPDATE question SET texts = "' + req.body.question + '" WHERE questionID = ' + Number(req.body.questionId)
    let query = db.query(sql, (err, result) => {

        if (err) {
            throw err;
        }
        let ans = 'DELETE FROM answer WHERE questionId = ' + req.body.questionId
        let query1 = db.query(ans, (err, result1) => {

            if (err) {
                throw err;
            }

        });
        res.send(result);
    });
});
app.post('/updateDetails', (req, res) => {

    let hash = crypto.createHash('sha512').update(req.body.password).digest('hex');
    let hash1 = crypto.createHash('sha512').update(req.body.password).digest('hex');

    let sql = "SELECT * FROM users WHERE id = '" + req.body.id + "'AND password = '" + hash + "'"
    console.log(sql)
    let query = db.query(sql, (err, result) => {
        console.log(result)
        if (err) {
            throw err;
        }
        if (result[0] != null) {
            let sql1 = 'UPDATE users SET email = "' + req.body.email + '", password = "' + hash1
            res.send({ result: 'Successfully updated' })
        } else {
            res.send({ result: 'password is incorrect' })
        }

    });
});