package com.makerloom.airtimerewards.utils

import android.content.Context
import android.support.design.widget.Snackbar
import android.support.v7.app.AppCompatActivity

class SnackbarUtils {
    companion object {
        fun showSnackbar (activity: AppCompatActivity, message: String) {
            Snackbar.make(activity.findViewById(android.R.id.content), message, Snackbar.LENGTH_LONG)
                    .show()
        }
    }
}