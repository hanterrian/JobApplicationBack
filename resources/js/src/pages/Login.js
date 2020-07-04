import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import { authHeader } from '../_helpers'

import {
  Grid,
  Card,
  CardHeader,
  CardContent,
} from '@material-ui/core'
import LoginForm from '../forms/login'
import { userActions } from '../_actions'

export default class Login extends Component {
  submit = values => {
    let { email, password, remember } = values
    
    userActions.login(email, password, remember)
  }

  render () {
    return (
      <Grid container direction="row" justify="center" alignItems="center">
        <Card className="col-md-6">
          <CardHeader title="Login"/>
          <CardContent>
            <LoginForm onSubmit={this.submit}/>
          </CardContent>
        </Card>
      </Grid>
    )
  }
}
