import { Checkbox, FormControlLabel, TextField } from '@material-ui/core'
import React from 'react'

export const renderTextField = ({
  input,
  label,
  meta: { touched, error },
  ...custom
}) => {
  if (touched && error) {
    custom['error'] = true
  }

  return (
    <TextField
      label={label}
      placeholder={label}
      helperText={touched && error}
      margin='dense'
      {...input}
      {...custom}
    />
  )
}

export const renderCheckbox = ({ input, label }) => (
  <FormControlLabel control={
    <Checkbox
      label={label}
      checked={input.value ? true : false}
      onChange={input.onChange}
      margin='dense'
    />
  } label={label}/>
)
