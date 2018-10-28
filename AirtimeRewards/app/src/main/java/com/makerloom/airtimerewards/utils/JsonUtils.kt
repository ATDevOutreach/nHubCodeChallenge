package com.makerloom.airtimerewards.utils

import android.content.Context
import org.json.JSONArray
import org.json.JSONObject



class JsonUtils {
    companion object {
        fun loadJsonStringFromAsset(context: Context, resId: Int): String? {
            var jsonString: String? = null

            try {
                val `is` = context.getResources().openRawResource(resId)
                val size = `is`.available()
                val buffer = ByteArray(size)
                `is`.read(buffer)
                `is`.close()
                jsonString = String(buffer, Charsets.UTF_8)
            }
            catch (ex: Exception) {
                ex.printStackTrace()
                return null
            }

            return jsonString
        }

        fun loadJsonFromAsset(context: Context, resId: Int): JSONObject? {
            try {
                val jsonString = loadJsonStringFromAsset(context, resId)
                return JSONObject(jsonString)
            }
            catch (ex: Exception) {
                ex.printStackTrace()
                return null
            }

        }

        fun loadJsonArrayFromAsset(context: Context, resId: Int): JSONArray? {
            try {
                val jsonString = loadJsonStringFromAsset(context, resId)
                return JSONArray(jsonString)
            }
            catch (ex: Exception) {
                ex.printStackTrace()
                return null
            }

        }
    }
}