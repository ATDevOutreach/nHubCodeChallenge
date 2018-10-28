'use strict'

let util = require('util')
let uuid = require('uuid')
let assert = require('assert')

let Market = require('../objects/market')

class Item {
    static fromJSON (obj) {
        const { name, description, markets, image } = obj

        return new Item(name, description, markets, image)
    }

    static fromJSONArray (objArray) {
        let items = []
        for (let item of objArray) {
            items.push(this.fromJSON(item))
        }
        return items
    }

    constructor (name, desc, markets, image) {
        this.name = name
        assert(util.isString(this.name))

        this.description = desc || ''
        assert(util.isString(this.description))

        this.markets = Market.fromJSONArray(markets || [])
        assert(util.isArray(this.markets))
        assert(this.markets[0] instanceof Market || !this.markets.length)

        this.image = image || ''

        this.uuid = uuid.v4()
    }
}

module.exports = Item