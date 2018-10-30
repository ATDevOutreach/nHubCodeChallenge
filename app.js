'use strict';

require('dotenv').config();

/***********************
 * Module dependencies *
 ***********************/
const   express           = require("express"),
        compress          = require("compression"),
        bodyParser        = require("body-parser"),
        cookieParser      = require("cookie-parser"),
        mongoose          = require("mongoose"),
        session           = require("express-session"),
        http              = require('http'),
        log4js            = require('log4js'),
        nodemon           = require("nodemon"),
        path              = require('path'),
        cors              = require('cors'),
        log               = require('./util/logger').getLogger('APP');

/********************
 * express instance *
 ********************/
    const app = express();   

/********************
 * Module variables *
 ********************/
const
    port = process.env.PORT,
    env = process.env.NODE_ENV,
    DBURL = process.env.DBURL;
let db;

/********************
 * App config       *
 ********************/
app.set('port', port);
app.set('env', env);

/********************
 * database config  *
 ********************/

mongoose.Promise = require('bluebird');

var options = {
  useMongoClient: true,
  socketTimeoutMS: 0,
  keepAlive: true,
  reconnectTries: 30
};
mongoose.connect(DBURL, options);
db = mongoose.connection;
db.on('error', err => {
  log.error('There was a db connection error');
});
db.once('connected', () => {
  log.info('connection created successfully!');
});
db.once('disconnected', () => {
  log.error('Successfully disconnected!');
});
process.on('SIGINT', () => {
  mongoose.connection.close(() => {
    log.error('dBase connection closed due to app termination');
    process.exit(0);
  });
});

/*********************
 * Module middleware *
 *********************/
    app.use(log4js.connectLogger(log, { level: 'auto' }));
    app.enabled('trust proxy');    
    app.use(bodyParser.urlencoded({ extended: true }));
    app.use(bodyParser.json());
    app.use((req, res, next) => {
      res.header('Access-Control-Allow-Origin', '*');
      res.header('Access-Control-Allow-Methods', 'GET,HEAD,OPTIONS,PUT,POST,DELETE');
      res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');
        if(req.method === 'OPTIONS') {
            res.status(200).end();
        }
        else {
            next();
        }
    });    

app.use(express.static(path.join(__dirname, 'public')));
    // view engine setup

app.set('view engine', 'jade');


/**********
 * Routes *
 *********/
    app.use('/', require('./app/routes/index'));
  

/**************
 * Export app *
 *************/

module.exports = app;