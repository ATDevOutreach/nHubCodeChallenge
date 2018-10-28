package com.makerloom.airtimerewards

import android.app.ProgressDialog
import android.content.Intent
import android.graphics.Typeface
import android.os.Bundle
import android.os.Handler
import android.support.design.widget.Snackbar
import android.support.v7.app.AppCompatActivity
import com.google.gson.Gson
import com.makerloom.airtimerewards.api.API
import com.makerloom.airtimerewards.api.APIService
import com.makerloom.airtimerewards.models.Question
import com.makerloom.airtimerewards.models.RequestSurveyRequest
import com.makerloom.airtimerewards.models.RequestSurveyResponse
import com.makerloom.airtimerewards.models.Survey
import com.makerloom.airtimerewards.utils.JsonUtils
import com.makerloom.airtimerewards.utils.SnackbarUtils

import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.content_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {

    val searchButtonFontName = "sans-serif-light"

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        setSupportActionBar(toolbar)

        look_for_survey_btn.textViewObject.typeface = Typeface.create(searchButtonFontName, Typeface.BOLD_ITALIC)
        look_for_survey_btn.setOnClickListener {
            checkForSurveys()
        }
    }

    private var progressDialog: ProgressDialog? = null

    fun startSurveyProgress () {
        progressDialog = ProgressDialog(this@MainActivity)

        progressDialog?.apply {
            setMessage("Looking For Surveys ...")
            setCancelable(false)
            setProgressStyle(ProgressDialog.STYLE_SPINNER)
            show()
        }
    }

    fun stopSurveyProgress () {
        try {
            progressDialog?.apply {
                hide()
                dismiss()
            }
        }
        catch (ex: Exception) {
            ex.printStackTrace()
        }
    }


    fun checkForSurveys () {
        startSurveyProgress()

        val surveyRequest = RequestSurveyRequest(true)

        val call: Call<RequestSurveyResponse> = API.Service.requestSurvey(surveyRequest)

        call
            .enqueue(object : Callback<RequestSurveyResponse > {
                override fun onFailure(call: Call<RequestSurveyResponse>?, t: Throwable?) {
                    SnackbarUtils.showSnackbar(this@MainActivity, "We were unable to load a survey. Please try again later.")
                    stopSurveyProgress()
                }

                override fun onResponse(call: Call<RequestSurveyResponse>?, response: Response<RequestSurveyResponse>?) {
                    response?.apply {
                        if (isSuccessful) {
                            loadSurvey(body())
                        }
                        else {
                            SnackbarUtils.showSnackbar(this@MainActivity, "We were unable to load a survey. Please try again later.")
                        }
                    }
                    stopSurveyProgress()
                }
            })

//        Handler().postDelayed(Runnable {
//            stopSurveyProgress()
//
//            val gson = Gson()
//            val questions = ArrayList<Question>()
//            val dummyQuestionsArray = JsonUtils.loadJsonArrayFromAsset(applicationContext, R.raw.questions)
//            dummyQuestionsArray?.let {
//                for (i in 0 until dummyQuestionsArray.length()) {
//                    val qJson = dummyQuestionsArray[i]
//                    val question = gson.fromJson(qJson.toString(), Question::class.java)
//                    questions.add(question)
//                }
//                val dummyResponse = RequestSurveyResponse(true, Survey(questions))
//                loadSurvey(dummyResponse)
//            }
//        }, 4000)
    }

    fun loadSurvey (response: RequestSurveyResponse?) {
        val survey = Intent(this@MainActivity, SurveyActivity::class.java)

        val gson = Gson()
        survey.putExtra(SurveyActivity.SURVEY_DATA_KEY, gson.toJson(response))

        startActivity(survey)
    }

}
