'use strict'

let helpers = require('./helpers')

let surveys = require('./surveys')

const _API_KEY = '38f478a9501db883d47e251dbc0a7f5ad36e20cb1eabfe16566308d2b56eeb08'
const _USERNAME = 'sandbox'

let AfricasTalking = require('africastalking')
let options = {
    apiKey: _API_KEY,
    username: _USERNAME,
}
let africasTalking = AfricasTalking(options)

let { SMS, AIRTIME } = africasTalking

let defaultErr = {
    success: false
}

let invalidArgsErr = {
    success: false,
    errorMessage: "Invalid arguments"
}

let apiError = (errorMessage) => {
    return {
        success: false,
        errorMessage
    }
}

module.exports = {
    sendAirtime: (req, res, next) => {
        let { phoneNumber, to, amount } = req.body

        console.log(`AIRTIME AMOUNT = ₦${amount}`)
        console.log(`RECIPIENT PHONE NUMBER = ${to || phoneNumber}`)

        if (!(phoneNumber || to) || !amount) {
            return res.send(invalidArgsErr)
        }

        AIRTIME.send({
                recipients: [
                    {
                        phoneNumber: to || phoneNumber,
                        amount: `NGN ${amount}`
                    }
                ]
            })
            .then((dat) => {
                console.log(`Airtime dat = `, dat)
                if (dat.errorMessage == 'None' || !dat.errorMessage) {
                    console.log(`Airtime was successfully sent to ${to || phoneNumber}`)
                    res.send({
                        success: true,
                        amount,
                        phoneNumber: phoneNumber || to,
                        to: to || phoneNumber
                    })
                }
                else {
                    console.error(`Airtime errMessage = `, dat.errorMessage)
                    res.send(apiError(dat.errorMessage))
                }
            })
            .catch((err) => {
                console.error(`err = `, err)
                res.send(defaultErr)
            })
    },

    sendData: (req, res, next) => {

    },

    sendText: (req, res, next) => {
        let { amount, phoneNumber, to } = req.body
	
	let message = `₦${amount} airtime has been sent to your phone number`
        let enqueue = true
        let from

        console.log(`TEXT MESSAGE = "${message}"`)
        console.log(`AIRTIME AMOUNT = ₦${amount}`)
        console.log(`RECIPIENT PHONE NUMBER = ${phoneNumber || to}`)

        if (!(phoneNumber || to) || !amount) {
            return res.send(invalidArgsErr)
        }

        SMS.send({
                message,
                to: phoneNumber || to,
                from,
                enqueue
            })
            .then((dat) => {
                console.log(`Text dat = `, dat)
                if (dat.errorMessage == 'None' || !dat.errorMessage) {
                    console.log(`Text message was successfully sent to ${to || phoneNumber}`)
                    res.send({
                        success: true,
                        amount,
                        phoneNumber,
                        to,
                        message
                    })
                }
                else {
                    console.error(`Text errMessage = `, dat.errorMessage)
                    res.send(apiError(dat.errorMessage))
                }
            })
            .catch((err) => {
                console.error(`err = `, err)
                res.send(defaultErr)
            })
    },

    requestSurvey: (req, res, next) => {
        try {
            res.send({
                success: true,
                survey: surveys.getRandomSurvey()
            })
        }
        catch (err) {
            res.send({
                success: false,
                errorMessage: err
            })
        }
    }
}
