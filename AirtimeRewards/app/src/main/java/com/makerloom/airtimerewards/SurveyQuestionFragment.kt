package com.makerloom.airtimerewards

import android.content.Context
import android.net.Uri
import android.os.Bundle
import android.support.v4.app.Fragment
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.google.gson.Gson
import com.makerloom.airtimerewards.models.Question
import com.makerloom.airtimerewards.utils.SurveyUtils
import com.stepstone.stepper.Step
import com.stepstone.stepper.VerificationError
import java.text.FieldPosition


// TODO: Rename parameter arguments, choose names that match
// the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
private const val POSITION_KEY = "param1"
private const val QUESTION_KEY = "param2"

class SurveyQuestionFragment : Fragment(), Step {
    // TODO: Rename and change types of parameters
    private var position: Int? = null
    private var question: Question? = null
    private var listener: OnFragmentInteractionListener? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        arguments?.let {
            position = it.getInt(POSITION_KEY)

            val gson = Gson()
            question = gson.fromJson(it.getString(QUESTION_KEY), Question::class.java)
        }
    }

    override fun verifyStep(): VerificationError? {
        Log.d(TAG, "verifyStep")
        return null
    }

    override fun onError(error: VerificationError) {
        Log.d(TAG, "onError")
    }

    override fun onSelected() {
        Log.d(TAG, "onSelected")
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?,
                              savedInstanceState: Bundle?): View? {
        // Inflate the layout for this fragment
        val view = inflater.inflate(R.layout.fragment_survey_question, container, false)

        (view as ViewGroup).addView(SurveyUtils.buildQuestionView(activity as AppCompatActivity,
                question!!))

        return view
    }

    // TODO: Rename method, update argument and hook method into UI event
    fun onButtonPressed(uri: Uri) {
        listener?.onFragmentInteraction(uri)
    }

    override fun onAttach(context: Context) {
        super.onAttach(context)
        if (context is OnFragmentInteractionListener) {
            listener = context
        } else {
            throw RuntimeException(context.toString() + " must implement OnFragmentInteractionListener")
        }
    }

    override fun onDetach() {
        super.onDetach()
        listener = null
    }

    interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        fun onFragmentInteraction(uri: Uri)
    }

    companion object {
        val TAG = SurveyQuestionFragment::class.java.simpleName

        // TODO: Rename and change types and number of parameters
        @JvmStatic
        fun newInstance(position: Int, question: Question) =
                SurveyQuestionFragment().apply {
                    arguments = Bundle().apply {
                        putInt(POSITION_KEY, position)

                        val gson = Gson()
                        putString(QUESTION_KEY, gson.toJson(question))
                    }
                }
    }
}
