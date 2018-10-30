/***********************
 * Module dependencies *
 ***********************/
let mongoose = require("mongoose");
bcrypt = require('bcrypt');


/********************************************
 *     MONGOOSE MODEL CONFIGURATION         *
 *******************************************/
const userSchema = new mongoose.Schema({
    firstName: {
        type: String,
        required: [true, 'Please enter your firstname']
    },
    lastName: {
        type: String,
        required: [true, 'Please add your last name']
    },
    phone: {
        type: Number,
        required: [true, 'Please add your phone number'],
        unique: true
    },
    email: {type: String, unique: true, required: true},
    password: {
        type: String,
        required: [true, 'Please add a password']
    },
    resetPasswordToken: String,
    resetPasswordExpires: Date,
    meta: {
        created_at: {type: Date, default: Date.now},
        updated_at: {type: Date, default: Date.now},
    }     
});

userSchema.statics.isEmailUnique = (email) => {
    return new Promise((resolve, reject) => {
        this.findOne({email:email})
            .exec((err, user) => {
                if (user) reject();
                else resolve();
            });
    });

};

userSchema.pre('save', (next) => {
    let user = this;
    bcrypt.hash(user.password, 10, (err, hash) => {
        if(err){
            return next(err);
        }
        user.password = hash;
        next()
    })
})


userSchema.statics.authenticate = function (phone, password, callback){
    User.findOne({ phone: phone}).exec(function (err, user){
        if(err){
            return callback(err)
        }else if(!user){
            let err = new Error('User not found');
            err.status = 401;
            return callback(err);
        }
        bcrypt.compare(password, user.password, (err, result) => {
            if (result === true){
                return callback(null, user);
            }
            else{
                return callback()
            }
            
        })
    })
}

userSchema.statics.authenticateWithOtp = ( otp, callback) => {
    User.findOne({resetPasswordToken: otp}).exec( (err, user) => {
        if(err){
            return callback(err)
        }else if(!user){
            let err = new Error('User not found');
            err.status = 401;
            return callback(err);
        }
        if(user.resetPasswordExpires >= Date.now()){
            return callback(null, user);
        }else{
            let err = new Error('OTP Expired');
            err.status = 401;
            return callback(err);
        }
            
       
    })
}


/******************
 * Export schema  *
 ******************/
module.exports = mongoose.model('User', userSchema);