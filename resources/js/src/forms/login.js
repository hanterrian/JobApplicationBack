import React from 'react'

import { Field, reduxForm } from 'redux-form'

import { TextField, FormControlLabel, Checkbox, Button } from '@material-ui/core'
import { LockOpen } from '@material-ui/icons'

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

  if (values.email && !/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.email)) {
    errors.email = 'Invalid email address'
  }

  return errors
}

const renderTextField = ({
  input,
  label,
  meta: { touched, error },
  ...custom
}) => (
  <TextField
    label={label}
    placeholder={label}
    helperText={touched && error}
    {...input}
    {...custom}
  />
)

const renderCheckbox = ({ input, label }) => (
  <FormControlLabel control={
    <Checkbox
      label={label}
      checked={input.value ? true : false}
      onChange={input.onChange}
    />
  } label={label}/>
)

let LoginForm = props => {
  const { handleSubmit, pristine, reset, submitting } = props

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <Field type="email" name="email" component={renderTextField} label="Email" fullWidth required/>
      </div>
      <div>
        <Field type="password" name="password" component={renderTextField} label="Password" fullWidth required/>
      </div>
      <div>
        <Field name="remember" component={renderCheckbox} label="Remember me"/>
      </div>
      <div>
        <Button type='submit' variant="contained" color='primary' startIcon={<LockOpen/>}>
          Sign in
        </Button>
      </div>
    </form>
  )
}

LoginForm = reduxForm({
  form: 'login',
  validate,
})(LoginForm)

export default LoginForm
