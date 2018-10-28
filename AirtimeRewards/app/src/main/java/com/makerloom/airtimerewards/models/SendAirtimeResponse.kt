package com.makerloom.airtimerewards.models

data class SendAirtimeResponse(val success: Boolean,
                               val amount: Int,
                               val phoneNumber: String): Response()