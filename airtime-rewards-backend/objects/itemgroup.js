'use strict'

let util = require('util')
let uuid = require('uuid')
let assert = require('assert')
let Item = require('./item')
let itemGroupDB = require('../models/itemgroups')

let helpers = require('../app/helpers')
let getQueryForItemGroup = helpers.getQueryForDoc

class ItemGroup {
    static fromJSON (obj) {
        const { name, description, items, priority } = obj

        return new ItemGroup(name, description, items, priority)
    }

    constructor (name, desc, items, priority) {
        this.name = name
        assert(util.isString(this.name))

        this.description = desc || ''
        assert(util.isString(this.description))

        this.items = Item.fromJSONArray(items || [])
        assert(util.isArray(this.items))
        assert(this.items[0] instanceof Item || !this.items.length)

        this.priority = parseInt(priority) || 3
        assert(util.isNumber(this.priority))

        this.uuid = uuid.v4()
    }

    static update (itemGroup, cb) {
        itemGroupDB.update(getQueryForItemGroup(itemGroup), itemGroup, {}, (err, cnt) => {
            console.log('Updates:', cnt)
            if (err) {
                return cb(err)
            }

            cb(err, cnt)
        })
    }

    static remove (itemGroup, cb) {
        itemGroupDB.remove(itemGroup, {}, (err, cnt) => {
            console.log('Removals:', cnt)
            if (err) {
                return cb(err, cnt)
            }

            cb(err, cnt)
        })
    }

    static save (itemGroup, cb) {
        itemGroupDB.insert(itemGroup, (err, newDoc) => {
            if (err) {
                return cb(err, newDoc)
            }

            cb(err, newDoc)
        })
    }

    static findAll (cb) {
        itemGroupDB.find({}).sort({
            priority: -1
        }).exec((err, docs) => {
            if (err) {
                return cb(err, docs)
            }

            cb(err, docs)
        })
    }

    static findOne (query, cb) {
        itemGroupDB.findOne(query, (err, doc) => {
            if (err) {
                return cb(err, doc)
            }

            cb(err, doc)
        })
    }
}

module.exports = ItemGroup