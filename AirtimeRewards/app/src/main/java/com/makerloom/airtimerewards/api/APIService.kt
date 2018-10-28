package com.makerloom.airtimerewards.api

import com.makerloom.airtimerewards.models.RequestSurveyRequest
import com.makerloom.airtimerewards.models.RequestSurveyResponse
import com.makerloom.airtimerewards.models.SendAirtimeRequest
import com.makerloom.airtimerewards.models.SendAirtimeResponse
import com.makerloom.airtimerewards.models.SendTextRequest
import com.makerloom.airtimerewards.models.SendTextResponse

import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.POST

interface APIService {
    @POST("sendAirtime")
    fun sendAirtime(@Body request: SendAirtimeRequest): Call<SendAirtimeResponse>

    @POST("sendText")
    fun sendText(@Body request: SendTextRequest): Call<SendTextResponse>

    @POST("requestSurvey")
    fun requestSurvey(@Body request: RequestSurveyRequest): Call<RequestSurveyResponse>
}