package com.makerloom.airtimerewards.utils

import android.content.Context
import android.graphics.Typeface
import android.support.v4.content.ContextCompat
import android.util.TypedValue
import android.view.Gravity
import android.view.View
import android.widget.*
import android.widget.LinearLayout.HORIZONTAL
import android.widget.LinearLayout.VERTICAL
import com.makerloom.airtimerewards.R
import com.makerloom.airtimerewards.models.Question

class SurveyUtils {
    companion object {
        fun buildQuestionView (context: Context, question: Question): View {
            val layout = LinearLayout(context)
            layout.orientation = LinearLayout.VERTICAL

            layout.addView(buildQuestionTextView(context, question))

            if (question.checkBoxType != null && question.checkBoxType) {
                layout.addView(buildCheckBoxesView(context, question))
            }
            else if (question.radioButtonType != null && question.radioButtonType) {
                layout.addView(buildRadioButtonsView(context, question))
            }
            else {
                layout.addView(buildEditTextView(context, question))
            }

            return layout
        }

        private fun buildRadioButtonsView (context: Context, question: Question): View {
            val radioGroup = RadioGroup(context)
            radioGroup.orientation = LinearLayout.VERTICAL

            question.options?.forEach {
                val radioButton = RadioButton(context)

                radioButton.apply {
                    text = it
                    setTextSize(TypedValue.COMPLEX_UNIT_SP, 16.5f)
                    typeface = Typeface.DEFAULT
                    setTextColor(ContextCompat.getColor(context, R.color.material_grey_600))
                }

                radioGroup.addView(radioButton)
            }

            return radioGroup
        }

        private fun buildCheckBoxesView (context: Context, question: Question): View {
            val layout = LinearLayout(context)
            layout.orientation = LinearLayout.VERTICAL

            question.options?.forEach {
                val checkBox = CheckBox(context)

                checkBox.apply {
                    text = it
                    setTextSize(TypedValue.COMPLEX_UNIT_SP, 16.5f)
                    typeface = Typeface.DEFAULT
                    setTextColor(ContextCompat.getColor(context, R.color.material_grey_600))
                }

                layout.addView(checkBox)
            }

            return layout
        }

        private fun buildEditTextView (context: Context, question: Question): View {
            val editText = EditText(context)

            editText.apply {
                hint = ""
                setSingleLine(true)
                setTextSize(TypedValue.COMPLEX_UNIT_SP, 16.5f)
                typeface = Typeface.DEFAULT
                setTextColor(ContextCompat.getColor(context, R.color.material_grey_600))
            }

            return editText
        }

        private fun buildQuestionTextView (context: Context, question: Question): View {
            val textView = TextView(context)

            textView.apply {
                text = question.questionText
                setTextSize(TypedValue.COMPLEX_UNIT_SP, 17.0f)
                typeface = Typeface.create("sans-serif-light", Typeface.BOLD)
                setTextColor(ContextCompat.getColor(context, R.color.material_grey_800))
                setPadding(paddingLeft + 12, paddingTop + 32, paddingRight, paddingBottom + 24)
            }

            return textView
        }
    }

}