package com.makerloom.airtimerewards

import android.app.ActionBar
import android.app.ProgressDialog
import android.content.DialogInterface
import android.content.Intent
import android.net.Uri
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.support.v7.app.AlertDialog
import android.util.DisplayMetrics
import android.util.Log
import android.util.TypedValue
import android.view.MenuItem
import android.view.View
import android.view.ViewGroup
import android.widget.EditText
import android.widget.LinearLayout
import com.google.gson.Gson
import com.makerloom.airtimerewards.api.API
import com.makerloom.airtimerewards.models.*
import com.makerloom.airtimerewards.utils.DialogUtils
import com.makerloom.airtimerewards.utils.PhoneUtils
import com.makerloom.airtimerewards.utils.SnackbarUtils
import com.makerloom.airtimerewards.utils.SurveyUtils
import com.makerloom.airtimerewards.utils.SurveyUtils.Companion.buildQuestionView
import com.stepstone.stepper.StepperLayout
import com.stepstone.stepper.VerificationError
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.content_survey.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class SurveyActivity : AppCompatActivity(), StepperLayout.StepperListener, SurveyQuestionFragment.OnFragmentInteractionListener {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_survey)
        setSupportActionBar(toolbar)
        supportActionBar?.apply {
            setDisplayHomeAsUpEnabled(true)
            setHomeButtonEnabled(true)
        }

        val surveyData = intent.getStringExtra(SurveyActivity.SURVEY_DATA_KEY)
        Log.d(TAG, surveyData)

        val gson = Gson()
        val response = gson.fromJson(surveyData, RequestSurveyResponse::class.java)

        stepper_layout.adapter = MyStepperAdapter(supportFragmentManager, this@SurveyActivity, response.survey)
        stepper_layout.setListener(this@SurveyActivity)
    }

    fun getAmountAndPhoneNumber(post: Runnable) {
        amount = getAmount()

        val params = LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT,
                LinearLayout.LayoutParams.MATCH_PARENT)

        val editText = EditText(this@SurveyActivity)
        editText.apply {
            setSingleLine(true)
            setText(DEFAULT_PHONE_NUMBER)
            setSelection(DEFAULT_PHONE_NUMBER.length)
            layoutParams = params
        }

        val layout = LinearLayout(this@SurveyActivity)
        layout.apply {
            addView(editText)
            layoutParams = params
            setPadding(paddingLeft + 36, paddingTop, paddingRight + 36, paddingBottom)
        }

        var alertDialog: AlertDialog? = null
        val alertDialogBuilder = AlertDialog.Builder(this@SurveyActivity)
                .setTitle("Survey Completed")
                .setMessage("What phone number do you want your airtime reward sent to?")
                .setView(layout)
                .setCancelable(true)
                .setPositiveButton("Continue", object: DialogInterface.OnClickListener {
                    override fun onClick(dialog: DialogInterface?, which: Int) {
                        val phoneNumber = editText.text.toString()
                        Log.d(TAG,"phoneNumber = $phoneNumber\namount = $amount")
                        if (PhoneUtils.isValid(phoneNumber)) {
                            this@SurveyActivity.phoneNumber = phoneNumber
                            post.run()
                        }
                        else {
                            SnackbarUtils.showSnackbar(this@SurveyActivity, "Please enter a valid phone number")
                            DialogUtils.dismiss(alertDialog)
                            getAmountAndPhoneNumber(post)
                        }
                    }
                })

        alertDialog = alertDialogBuilder.create()
        alertDialog.show()
    }

    private var amount: Int = getAmount()

    private var phoneNumber: String = DEFAULT_PHONE_NUMBER

    override fun onCompleted(completeButton: View?) {
        getAmountAndPhoneNumber(Runnable {
            showProgress()
            sendAirtime(amount, phoneNumber)
            Handler().postDelayed(Runnable {
                sendConfirmationText(amount, phoneNumber)
            }, 500)
        })
    }

    fun goToCompleteActivity () {
        startActivity(Intent(this@SurveyActivity, CompleteActivity::class.java))
        finish()
    }

    override fun onError(verificationError: VerificationError?) {
        Log.d(TAG, "onError $verificationError")
    }

    override fun onStepSelected(newStepPosition: Int) {
        Log.d(TAG, "onStepSelected $newStepPosition")
    }

    override fun onReturn() {
        Log.d(TAG, "onReturn")
        finish()
    }

    override fun onFragmentInteraction(uri: Uri) {
        Log.d(TAG, "onFragmentInteraction $uri")
    }

    var airtimeRequestComplete = false
    fun sendAirtime ( amount: Int, phoneNumber: String) {
        airtimeRequestComplete = false
        val request = SendAirtimeRequest(true, amount, phoneNumber = phoneNumber, to = phoneNumber)

        val call = API.Service.sendAirtime(request)
        call.enqueue(object : Callback<SendAirtimeResponse> {
            override fun onFailure(call: Call<SendAirtimeResponse>?, t: Throwable?) {
                Log.d(TAG, "onFailure Airtime")
                SnackbarUtils.showSnackbar(this@SurveyActivity, "An error occured while submitting the survey, Please try again later")
                complete()
            }

            override fun onResponse(call: Call<SendAirtimeResponse>?, response: Response<SendAirtimeResponse>?) {
                complete()
                Log.d(TAG, "onResponse Airtime")
                Log.d(TAG, response?.toString())
                response?.apply {
                    Log.d(TAG, response.body().toString())
                    if (isSuccessful && isSuccessful(response.body())) {
                        Log.d(TAG, "Send Airtime Success")
                        goToCompleteActivity()
                    }
                    else {
                        SnackbarUtils.showSnackbar(this@SurveyActivity, "An error occured while submitting the survey, Please try again later")
                    }
                }
            }

            fun complete () {
                airtimeRequestComplete = true
                hideProgress()
            }
        })
    }

    var textRequestComplete = false
    fun sendConfirmationText (amount: Int, phoneNumber: String) {
        textRequestComplete = false
        val request = SendTextRequest(true, amount, to = phoneNumber, phoneNumber = phoneNumber)

        val call = API.Service.sendText(request)
        call.enqueue(object : Callback<SendTextResponse> {
            override fun onFailure(call: Call<SendTextResponse>?, t: Throwable?) {
                Log.d(TAG, "onFailure Text")
                SnackbarUtils.showSnackbar(this@SurveyActivity, "An error occured while submitting the survey, Please try again later")
                complete()
            }

            override fun onResponse(call: Call<SendTextResponse>?, response: Response<SendTextResponse>?) {
                complete()
                Log.d(TAG, "onResponse Text")
                Log.d(TAG, response?.toString())
                response?.apply {
                    Log.d(TAG, response.body().toString())
                    if (!isSuccessful || !isSuccessful(response.body())) {
                        SnackbarUtils.showSnackbar(this@SurveyActivity, "An error occured while submitting the survey, Please try again later")
                    }
                    else {
                        Log.d(TAG, "Send Text Success")
                    }
                }
            }

            fun complete () {
                textRequestComplete = true
                hideProgress()
            }
        })
    }

    fun isSuccessful (response: SendAirtimeResponse?): Boolean {
        return response != null && response.success
    }

    fun isSuccessful (response: SendTextResponse?): Boolean {
        return response != null && response.success
    }

    fun bothRequestsComplete (): Boolean {
        return textRequestComplete && airtimeRequestComplete
    }

    private var progressDialog: ProgressDialog? = null

    fun hideProgress () {
        if (bothRequestsComplete()) {
            try {
                progressDialog?.apply {
                    hide()
                    dismiss()
                }
            } catch (ex: Exception) {
                ex.printStackTrace()
            }
        }
    }

    fun showProgress () {
        progressDialog = ProgressDialog(this@SurveyActivity)
        progressDialog?.apply {
            setMessage("Submitting Survey Answers & Processing Airtime Reward ...")
            setCancelable(false)
            setProgressStyle(ProgressDialog.STYLE_SPINNER)
            show()
        }
    }

    companion object {
        val SURVEY_DATA_KEY = "SURVEY_DATA"

        val TAG = SurveyActivity::class.java.simpleName

        val DEFAULT_PHONE_NUMBER = "+2349034099658"
    }

    override fun onOptionsItemSelected(item: MenuItem?): Boolean {
        if (item?.itemId == android.R.id.home) {
            onBackPressed()
            return true
        }

        return super.onOptionsItemSelected(item)
    }

    fun getAmount(): Int {
        return 50
    }
}
