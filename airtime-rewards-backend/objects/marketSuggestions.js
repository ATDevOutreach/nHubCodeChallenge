'use strict'

let util = require('util')
let uuid = require('uuid')
let assert = require('assert')
let marketSuggestionsDB = require('../models/marketSuggestions')

let helpers = require('../app/helpers')
let getQueryForItemGroup = helpers.getQueryForDoc

class MarketSuggestion {
    static fromJSON (obj) {
        let { name, location, phone, email } = obj

        return new MarketSuggestion(name, location, phone, email)
    }

    constructor (name, location, phone, email) {
        this.name = name || ''
        assert(util.isString(this.name))

        this.location = location || ''
        assert(util.isString(this.location))

        this.phone = phone || ''
        // TODO: Use better validation
        assert(util.isString(this.phone)) // &&
            // (this.phone.length == 11 && this.phone.startsWith('0') ||
            // this.phone.length == 14 && this.phone.startsWith('+234')))

        this.email = email || ''
        assert(util.isString(this.email))

        this.uuid = uuid.v4()
    }

    static save (suggestion, cb) {
        marketSuggestionsDB.insert(suggestion, (err, newDoc) => {
            if (err) {
                return cb(err, newDoc)
            }

            cb(err, newDoc)
        })
    }

    static findAll (cb) {
        marketSuggestionsDB.find({}, (err, docs) => {
            if (err) {
                return cb(err, docs)
            }
            cb(err, docs)
        })
    }
}

module.exports = MarketSuggestion