'use strict'

let path = require('path')
let express = require('express')
let stylus = require('stylus')
let nib = require('nib')
let bodyParser = require('body-parser')
let favicon = require('serve-favicon')
let multer = require('multer')
let ms = require('ms')
let compression = require('compression')
let uuid = require('uuid')

let routes = require('./app/routes')
let api = require('./app/api')

let app = express()

app.set('homedir', __dirname)
app.set('port', process.env.PORT || 3000)
app.set('host', process.env.HOST || 'localhost')
app.set('views', __dirname + '/public/views/pug')
app.set('view engine', 'pug')
app.set('projectName', 'Airtime Rewards')
app.locals['companyName'] = 'Makerloom Software Ltd.'
app.locals.year = new Date().getFullYear()
app.locals.designerPerson = 'Michael Ogezi'
app.locals.designerPersonSite = 'https://makerloom.com'

app.use(compression())
app.use(express.static(path.join(__dirname + '/public'), {
    maxAge: process.env.NODE_ENV == 'production' ? ms('1 day') : ms('0')
}))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({
    extended: true
}))
app.use((req, res, next) => {
    console.log(req.path)
    next()
})

// Constants
const _API = 'api'
const _SEND_TEXT = 'sendText'
const _SEND_AIRTIME = 'sendAirtime'
const _SEND_DATA = 'sendData'
const _REQUEST_SURVEY = 'requestSurvey'

// Home page
app.get('/', routes.index)

// API routes
app.post(`/${_API}/${_SEND_TEXT}`, api.sendText)

app.post(`/${_API}/${_REQUEST_SURVEY}`, api.requestSurvey)

app.post(`/${_API}/${_SEND_DATA}`, api.sendData)
app.post(`/${_API}/${_SEND_AIRTIME}`, api.sendAirtime)

app.locals.pretty = true

app.listen(app.get('port'), () => {
    console.log(`Listening on ${app.get('host')}:${app.get('port')} in ${process.env.NODE_ENV} mode`)
})