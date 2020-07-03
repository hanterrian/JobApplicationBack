import React, { Component } from 'react'
import ReactDOM from 'react-dom'

import {
  Grid,
  Card,
  CardHeader,
  CardContent,
  CardActions,
  FormGroup,
  FormControl,
  FormControlLabel,
  TextField,
  Switch,
  Button,
} from '@material-ui/core'
import LoginForm from '../forms/login'

export default class Login extends Component {
  render () {
    return (
      <Grid container direction="row" justify="center" alignItems="center">
        <Card className="col-md-6">
          <CardHeader title="Login"/>
          <CardContent>
            <LoginForm/>
          </CardContent>
        </Card>
      </Grid>
    )
  }
}
