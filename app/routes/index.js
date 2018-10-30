const os = require('os');
const express = require('express');
const router = express.Router();
const jwt = require('jsonwebtoken');
const config = require('../../config');
const user = require('./app/index');

const ifaces = os.networkInterfaces();
const ips = [];

Object.keys(ifaces).forEach(function (ifname) {
  var alias = 0;

  ifaces[ifname].forEach(function (iface) {
    if ('IPv4' !== iface.family || iface.internal !== false) {
      return;
    }
    ips.push(iface.address);
  });
});

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Africa\'s Talking \n'});
});


/* GET users listing. */
router.get('/register', (req, res, next) => {
  res.render('register', {title:'Register'});
});


router.get('/forgot', (req, res, next) => {
  res.render('forgot', {title:'Forgot'});
});

router.get('/login', function(req, res, next) {
  res.render('login', {
    user: req.user
  });
});

//All routes to be used
router.use('/', user);


module.exports = router;
