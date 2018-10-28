package com.makerloom.airtimerewards.utils

import java.util.ArrayList
import java.util.Arrays

class PhoneUtils {
    companion object {
        internal val INVALID_NUMBER: Int? = -1

        internal val MTN_NUMBER = 0
        internal val GLO_NUMBER = 1
        internal val AIRTEL_NUMBER = 2
        internal val ETISALAT_NUMBER = 3

        internal val allNumberPrefixes: List<String>
            get() {
                val allNumberPrefixes = ArrayList<String>()

                allNumberPrefixes.addAll(Arrays.asList(*MTN.numberPrefixes))
                allNumberPrefixes.addAll(Arrays.asList(*GLO.numberPrefixes))
                allNumberPrefixes.addAll(Arrays.asList(*Airtel.numberPrefixes))
                allNumberPrefixes.addAll(Arrays.asList(*Etisalat.numberPrefixes))

                return allNumberPrefixes
            }

        internal var ALL_NUMBER_PREFIXES = allNumberPrefixes

        internal val MIN_PHONE_NO_LEN = 11
        internal val MAX_PHONE_NO_LEN = 14

        internal var NIGERIA_CODE = "+234"

        fun isValid(phoneNumber: String): Boolean {
            val len = phoneNumber.length

            for (numberPrefix in ALL_NUMBER_PREFIXES) {
                if (phoneNumber.startsWith(numberPrefix) && (len == MIN_PHONE_NO_LEN && !phoneNumber.startsWith("+234") || len == MAX_PHONE_NO_LEN && !phoneNumber.startsWith("0"))) {
                    return true
                }
            }

            return false
        }

        internal fun getType(phoneNumber: String): Int {
            // MTN
            for (numberPrefix in MTN.numberPrefixes) {
                if (phoneNumber.startsWith(numberPrefix)) {
                    return MTN_NUMBER
                }
            }
            // GLO
            for (numberPrefix in GLO.numberPrefixes) {
                if (phoneNumber.startsWith(numberPrefix)) {
                    return GLO_NUMBER
                }
            }
            // Airtel
            for (numberPrefix in Airtel.numberPrefixes) {
                if (phoneNumber.startsWith(numberPrefix)) {
                    return AIRTEL_NUMBER
                }
            }
            // Etisalat
            for (numberPrefix in Etisalat.numberPrefixes) {
                if (phoneNumber.startsWith(numberPrefix)) {
                    return ETISALAT_NUMBER
                }
            }

            return INVALID_NUMBER!!
        }

        internal object MTN {
            var numberPrefixes = arrayOf("+234703", "+234706", "+234803", "+234806", "+234810", "+234813", "+234814", "+234816", "+234903", "+234906", "0703", "0706", "0803", "0806", "0810", "0813", "0814", "0816", "0903", "0906")
        }

        internal object GLO {
            var numberPrefixes = arrayOf("+234705", "+234805", "+234807", "+234811", "+234815", "+234905", "0705", "0805", "0807", "0811", "0815", "0905")
        }

        internal object Airtel {
            var numberPrefixes = arrayOf("+234701", "+234708", "+234802", "+234808", "+234812", "+234902", "+234907", "0701", "0708", "0802", "0808", "0812", "0902", "0907")
        }

        internal object Etisalat {
            var numberPrefixes = arrayOf("+234809", "+234817", "+234818", "+234908", "+234909", "0809", "0817", "0818", "0908", "0909")
        }
    }
}