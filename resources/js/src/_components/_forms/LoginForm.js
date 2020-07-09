import React from 'react'

import { Link } from 'react-router-dom'

import { Form, Field, reduxForm } from 'redux-form'
import { renderTextField, renderCheckbox } from '../../_helpers/fields'

import { Button, InputAdornment, Icon } from '@material-ui/core'

import EmailOutlinedIcon from '@material-ui/icons/EmailOutlined'
import VpnKeyOutlinedIcon from '@material-ui/icons/VpnKeyOutlined'
import LockOutlinedIcon from '@material-ui/icons/LockOutlined'

const validate = values => {
  const errors = {}
  const requiredFields = [
    'email',
    'password',
  ]
  requiredFields.forEach(field => {
    if (!values[field]) {
      errors[field] = 'Required'
    }
  })
  if (
    values.email &&
    !/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.email)
  ) {
    errors.email = 'Invalid email address'
  }
  return errors
}

let LoginForm = props => {
  const { handleSubmit } = props

  return (
    <Form onSubmit={handleSubmit}>
      <Field
        label="Email"
        name="email"
        component={renderTextField}
        type="email"
        required
        InputProps={{
          startAdornment: <InputAdornment position="start">
            <EmailOutlinedIcon/>
          </InputAdornment>,
        }}
      />
      <Field
        label="Password"
        name="password"
        component={renderTextField}
        type="password"
        required
        InputProps={{
          startAdornment: <InputAdornment position="start">
            <VpnKeyOutlinedIcon/>
          </InputAdornment>,
        }}
      />
      <Field
        label="Remember me"
        name="remeber"
        component={renderCheckbox}
      />

      <div>
        <Button
          color="primary"
          variant="contained"
          type="submit"
          startIcon={<LockOutlinedIcon/>}
        >
          Submit
        </Button>
        <Button
          color="primary"
          to="/register"
          component={Link}
        >
          Register
        </Button>
      </div>
    </Form>
  )
}

LoginForm = reduxForm({
  form: 'LoginForm',
  validate,
})(LoginForm)

export default LoginForm
