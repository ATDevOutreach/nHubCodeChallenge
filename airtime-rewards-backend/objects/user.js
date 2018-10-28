'use strict'

let util = require('util')
let uuid = require('uuid')
let ms = require('ms')
let assert = require('assert')
let userDB = require('../models/users')

let helpers = require('../app/helpers')
let getQueryForUser = helpers.getQueryForUser

let defaultCb = (err, doc) => {
    if (err) {
        console.error(err)
    }
    else {
        console.log(doc)
    }
}

class User {
    static fromJSON (obj) {
        let { phone, email, password, loginCount, paymentValidTill } = obj

        let user = new User(phone, email, password, loginCount, paymentValidTill)
        user.uuid = obj.uuid || user.uuid, user._id = obj._id

        return user
    }

    constructor (phone, email, password, loginCount, paymentValidTill) {
        this.phone = phone || ''
        // TODO: Use better validation
        assert(util.isString(this.phone)) /* && 
            (this.phone.length == 11 && this.phone.startsWith('0') ||
            this.phone.length == 14 && this.phone.startsWith('+234'))) */

        this.email = email || ''
        assert(util.isString(this.email))

        this.password = password || ''
        assert(util.isString(this.password))

        this.loginCount = loginCount || 0
        assert(util.isNumber(this.loginCount))

        this.paymentValidTill = paymentValidTill || 0
        assert(util.isNumber(this.paymentValidTill))

        this.uuid = uuid.v4()
    }

    static signup (phone, email, password, cb) { // cb(err, success, user, message)
        userDB.find({
            $or: [
                { phone },  { email }
            ]
        }, (err, docs) => {
            if (err) {
                cb(err, false)
            }
            else if (docs.length) {
                cb(err, false, null, 'Phone number or email are already in use. Please use another and try again.')
            }
            else {
                userDB.insert({
                    phone, email, password
                }, (err, doc) => {
                    if (err) {
                        cb(err, false)
                    }
                    else {
                        console.log(`User account created`)
                        let user = User.fromJSON(doc)
                        cb(err, true, user)
                        User.incLoginCount(user, (err, cnt) => {
                            if (!err) {
                                console.log(`User loginCount updated to ${user.loginCount}`)
                            }
                        })
                    }
                })
            }
        })
    }

    static login (phone, password, cb) { // cb(err, success, user, message)
        userDB.findOne({
            password, phone
        }, (err, doc) => {
            if (err) {
                cb(err, false)
            }
            else if (!doc || !Object.keys(doc || {}).length) {
                cb(err, false, {}, 'Invalid login credentials. Please try again.')
            }
            else {
                let user = User.fromJSON(doc);
                cb(err, true, user)
                User.incLoginCount(user, (err, cnt) => {
                    if (!err) {
                        console.log(`User loginCount updated to ${user.loginCount}`)
                    }
                })
            }
        })
    }

    static update (user, cb) {
        userDB.update(getQueryForUser(user), user, {}, (err, cnt) => {
            console.log('Updates:', cnt)
            if (err) {
                cb(err)
            }

            cb(err, cnt)
        })
    }

    static payForMonth (user, cb) {
        userDB.update(getQueryForUser(user), {
            $set: {
                paymentValidTill: Date.now() + ms('31 days')
            }
        }, {}, (err, cnt) => {
            console.log('Updates:', cnt)
            if (err) {
                cb(err)
            }

            cb(err, cnt)
        })
    }

    static payForYear (user, cb) {
        userDB.update(getQueryForUser(user), {
            $set: {
                paymentValidTill: Date.now() + ms('1 year')
            }
        }, {}, (err, cnt) => {
            console.log('Updates:', cnt)
            if (err) {
                cb(err)
            }

            cb(err, cnt)
        })
    }

    static incLoginCount (user, cb) {
        userDB.update(getQueryForUser(user), {
            $inc: {
                loginCount: 1
            }
        }, {}, (err, cnt) => {
            console.log('Updates:', cnt)
            if (err) {
                cb(err)
            }
            cb(err, cnt)
        })
    }
 
    static findAll (cb) {
        userDB.find({}, cb)
    } 
}

module.exports = User