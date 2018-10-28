'use strict'

let util = require('util')
let uuid = require('uuid')
let assert = require('assert')

class Market {
    static fromJSON (obj) {
        let { name, phone, grades } = obj

        return new Market(name, phone, grades)
    }

    static isFilledJSON (obj) {
        let { name, phone, grades } = obj
        console.log(grades)
        grades = grades.filter((grade) => {
            if (grade) {
                return grade
            }
        })
        obj.grades = grades
        let hasGrade = false
        for (let grade of grades) {
            if (grade) {
                hasGrade = true
            }
        }

        if (name || phone || hasGrade) {
            return true
        }

        return false
    }

    static fromJSONArray (objArray) {
        let markets = []
        for (let market of objArray) {
            if (Market.isFilledJSON(market)) {
                markets.push(Market.fromJSON(market))
            }
        }
        return markets
    }

    constructor (name, phone, grades) {
        this.name = name || ''
        assert(util.isString(this.name))

        this.phone = phone || ''
        // TODO: Use better validation
        assert(util.isString(this.phone)) // &&
            // (this.phone.length == 11 && this.phone.startsWith('0') ||
            // this.phone.length == 14 && this.phone.startsWith('+234')))

        this.grades = grades || []
        assert(util.isArray(this.grades))

        this.uuid = uuid.v4()
    }
}

module.exports = Market