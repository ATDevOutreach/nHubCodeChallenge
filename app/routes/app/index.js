/***********************
 * Module dependencies *
 ***********************/
const express = require('express');
const router = express.Router();
const jwt = require('jsonwebtoken');

/**********************
 *  Imported files    *
 **********************/
const config = require('../../../config');
const publicRoutes = require('./public');
// const privateRoutes = require('./private');


const airtime = require('../airtime');
const sms = require('../sms');
const payment = require('../payment');


router.use(airtime);
router.use(sms);
router.use(payment);


//All public routes
// const userControl = require('../user');


module.exports = publicRoutes;
router.use(publicRoutes);


/******************
 * Export router  *
 ******************/
module.exports = router;
