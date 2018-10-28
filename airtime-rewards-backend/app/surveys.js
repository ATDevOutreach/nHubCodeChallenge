let _ = require('underscore')

let helpers = require('./helpers')

let questions = [
    {
        questionText: 'What is your favourite car brand?',
        inputType: true,
    },
    {
        questionText: 'What age bracket are you in?',
        radioButtonType: true,
        options: [
            'Below 18',
            '18-25',
            '26-30',
            '31-40',
            '41-50',
            'Above 50'
        ]
    },
    {
        questionText: 'What is your favourite instant noodles product?',
        radioButtonType: true,
        options: [
            'Indomie Noodles',
            'Mi Mi Noodles',
            'Dangote Noodles',
            'Other'
        ]
    },
    {
        questionText: 'What is your party of choice in the upcoming elections?',
        radioButtonType: true,
        options: [
            'PDP',
            'APC',
            'SDP',
            'Other'
        ]
    },
    {
        questionText: 'Who is your candidate of choice in the upcoming elections?',
        radioButtonType: true,
        options: [
            'Donald Duke',
            'Atiku Abubakar',
            'Mohammadu Buhari',
            'Other'
        ]
    },
    {
        questionText: 'Which transport means would you use when travelling across geopolitical zones?',
        checkBoxType: true,
        options: [
            'Train',
            'Public Vehicle',
            'Private Vehicle',
            'Plane'
        ]
    }
]

class Question {
    constructor () {
        this.imageUrl
        this.questionText

        this.inputType
        this.checkBoxType
        this.radioButtonType

        this.options
    }
}

class Answer {
    constructor () {
        this.questionText
        
        this.inputType
        this.checkBoxType
        this.radioButtonType

        this.answers
        this.options
    }
}

class Survey {
    constructor (questions) {
        this.questions = questions
    }
}



module.exports = {
    getRandomSurvey: () => {
        let qCount = helpers.getValueBetweenInclusive(3, 5)

        return new Survey(_.sample(questions, qCount))
    }
}