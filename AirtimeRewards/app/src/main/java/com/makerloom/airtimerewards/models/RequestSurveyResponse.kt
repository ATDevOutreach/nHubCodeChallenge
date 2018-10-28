package com.makerloom.airtimerewards.models

data class RequestSurveyResponse (val success: Boolean,
                                  val survey: Survey) : Response()
