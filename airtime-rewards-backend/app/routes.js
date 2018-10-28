'use strict'

let _ = require('underscore')
let fs = require('fs')
let path = require('path')

let helpers = require('../app/helpers')

let index = (req, res, next) => {
    res.send(`Welcome to the ${req.app.get('projectName')} API v1\n`)
}

module.exports = {
    index
}