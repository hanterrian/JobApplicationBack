import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import {
  Grid,
  Card,
  CardHeader,
  CardContent,
} from '@material-ui/core'

import LoginForm from '../_components/_forms/LoginForm'

export default class Login extends Component {
  submit = values => {
    console.log(values)
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
