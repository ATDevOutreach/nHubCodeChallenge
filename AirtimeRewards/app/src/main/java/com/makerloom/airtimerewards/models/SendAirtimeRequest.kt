package com.makerloom.airtimerewards.models

data class SendAirtimeRequest(val success: Boolean,
                              val amount: Int,
                              val phoneNumber: String,
                              val to: String) : Request()
