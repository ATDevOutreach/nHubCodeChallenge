'use script'

let uuid = require('uuid')

let generateOrQuery = (id) => {
    return {
        $or: [
            { uuid: id },
            { _id: id }
        ]
    }
}

let getValueBetweenInclusive = (start, stop) => {
    let diff = Math.abs(stop - start) + 1
    return Math.floor(Math.random() * diff) + start
}

let getQueryForDoc = (doc) => {
    return {
        $or: [
            { _id: doc._id }, { _id: doc.uuid },
            { uuid: doc.uuid}, { uuid: doc._id }
        ]
    }
}

let getItemImagePath = (imageUuid) => {
    return `/uploads/${imageUuid}`;
} 

let getItemImageLocalPath = (imageUuid) => {
    return `public/uploads/${imageUuid}`;
} 

let getQueryForUser = (user) => {
    return { 
        $or: [ 
            { _id: user._id },
            { phone: user.phone || uuid.v4() },
            { email: user.email || uuid.v4() }
        ]
    }
}

module.exports = {
    generateOrQuery,
    getQueryForDoc,
    getQueryForUser,
    getItemImagePath,
    getItemImageLocalPath,
    getValueBetweenInclusive
}