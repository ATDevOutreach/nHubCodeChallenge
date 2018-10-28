package com.makerloom.airtimerewards.utils

import android.support.v7.app.AlertDialog

class DialogUtils {
    companion object {
        fun dismiss (alertDialog: AlertDialog?) {
            try {
                alertDialog?.dismiss()
            }
            catch (ex: Exception) {
                ex.printStackTrace()
            }
        }
    }
}