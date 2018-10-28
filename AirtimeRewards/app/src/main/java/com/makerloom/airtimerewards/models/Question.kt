package com.makerloom.airtimerewards.models

data class Question (val questionText: String,
                     val imageUrl: String? = null,

                     val inputType: Boolean? = false,
                     val radioButtonType: Boolean? = false,
                     val checkBoxType: Boolean? = false,

                     val options: ArrayList<String>? = null)