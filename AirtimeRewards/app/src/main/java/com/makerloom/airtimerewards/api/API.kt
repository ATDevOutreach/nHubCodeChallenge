package com.makerloom.airtimerewards.api

import android.util.Log

import java.util.Locale
import java.util.concurrent.TimeUnit

import okhttp3.OkHttpClient
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

object API {
    private val DEFAULT_TIMEOUT_IN_SECONDS = 30

    private val DEBUG = !true

    private val TAG = API::class.java.simpleName

    private val PROTOCOL = "http"
    private val DEBUG_IP_ADDR = "192.168.43.121"
    private val DEBUG_DOMAIN = "$DEBUG_IP_ADDR:3000"
    private val PRODUCTION_DOMAIN = "airtime-rewards-backend.herokuapp.com"
    private val DEBUG_BASE_URL = String.format(Locale.getDefault(), "%s://%s", PROTOCOL, DEBUG_DOMAIN)
    private val PRODUCTION_BASE_URL = String.format(Locale.getDefault(), "%s://%s", PROTOCOL, PRODUCTION_DOMAIN)
    private val ROUTE = "/api/"

    val baseUrl: String
        get() {
            val url: String
            if (DEBUG) {
                url = DEBUG_BASE_URL
            } else {
                url = PRODUCTION_BASE_URL
            }

            Log.d(TAG, url)
            return url
        }

    val url: String
        get() {
            val url: String
            if (DEBUG) {
                url = DEBUG_BASE_URL + ROUTE
            } else {
                url = PRODUCTION_BASE_URL + ROUTE
            }

            Log.d(TAG, url)
            return url
        }

    private val okHttpClient = OkHttpClient.Builder()
            .connectTimeout(DEFAULT_TIMEOUT_IN_SECONDS.toLong(), TimeUnit.SECONDS)
            .writeTimeout(DEFAULT_TIMEOUT_IN_SECONDS.toLong(), TimeUnit.SECONDS)
            .readTimeout(DEFAULT_TIMEOUT_IN_SECONDS.toLong(), TimeUnit.SECONDS)
            .build()

    private val retrofit = Retrofit.Builder()
            .baseUrl(url)
            .addConverterFactory(GsonConverterFactory.create())
            .client(okHttpClient)
            .build()

    val Service = retrofit.create(APIService::class.java)
}