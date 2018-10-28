package com.makerloom.airtimerewards

import android.support.v4.app.FragmentManager
import android.content.Context
import android.util.Log
import com.makerloom.airtimerewards.models.Survey
import com.stepstone.stepper.Step

import com.stepstone.stepper.adapter.AbstractFragmentStepAdapter
import com.stepstone.stepper.viewmodel.StepViewModel

class MyStepperAdapter(fragmentManager: FragmentManager, context: Context, survey: Survey) : AbstractFragmentStepAdapter(fragmentManager, context) {
    private var survey: Survey

    init {
        this.survey = survey
    }

    override fun getCount(): Int {
        return survey.questions.size
    }

    override fun createStep(position: Int): Step {
        val questionFragment = SurveyQuestionFragment.newInstance(position, survey.questions.get(position))
        Log.d(TAG, questionFragment.toString())

        return questionFragment
    }

    override fun getViewModel(position: Int): StepViewModel {
        return StepViewModel.Builder(context)
                .setTitle("Question ${position + 1}")
                .create()
    }

    companion object {
        val TAG = MyStepperAdapter::class.java.simpleName
    }
}
