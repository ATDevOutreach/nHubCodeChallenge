package com.makerloom.airtimerewards.models

data class SendTextResponse (val success: Boolean,
                             val amount: Int,
                             val to: String) : Response()
