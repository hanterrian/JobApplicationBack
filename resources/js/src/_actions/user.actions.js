import React, { Component } from 'react'
import { userConstants } from '../_constants'
import { alertActions } from './'
import { history, store } from '../_helpers'

export const userActions = {
  login,
  logout,
}

function login (email, password, remember) {
  store.dispatch(request({ email }))

  axios({
    method: 'post',
    url: `/api/auth/login`,
    data: {
      email: email,
      password: password,
      remember: remember,
    },
  }).then(({ data }) => {
    if (data.token) {
      store.dispatch(success(data))
    } else {
      store.dispatch(failure(data))
      store.dispatch(alertActions.error(data))
    }
  }).catch(error => {
    if (error.response.status === 422) {
      store.dispatch(failure(error.response.data))
    } else {
      store.dispatch(alertActions.error(error.response.data))
    }
  })

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
