import React, { Component } from 'react'
import { userConstants } from '../_constants'
import { userService } from '../_services'
import { alertActions } from './'
import { history, store } from '../_helpers'

export const userActions = {
  login,
  logout,
}

function login (email, password, remember) {
  console.log(email)
  console.log(password)

  store.dispatch(request({ email }))

  userService.login(email, password, remember).then(
    console.log(111111),
    // user => {
    //   store.dispatch(success(user))
    //   history.push('/')
    // },
    // error => {
    //   store.dispatch(failure(error))
    //   store.dispatch(alertActions.error(error))
    // },
  )

  function request (user) { return { type: userConstants.LOGIN_REQUEST, user } }

  function success (user) { return { type: userConstants.LOGIN_SUCCESS, user } }

  function failure (error) {
    return {
      type: userConstants.LOGIN_FAILURE,
      error,
    }
  }
}

function logout () {
  userService.logout()
  return { type: userConstants.LOGOUT }
}
