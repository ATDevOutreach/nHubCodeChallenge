package com.makerloom.airtimerewards.models

data class SendTextRequest(val success: Boolean,
                           val amount: Int,
                           val to: String,
                           val phoneNumber: String) : Request()