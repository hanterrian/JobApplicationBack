import { combineReducers } from 'redux'
import { authentication } from './authentication.reducer'
import { alert } from './alert.reducer'

import { reducer as formReducer } from 'redux-form'

const rootReducer = combineReducers({
  authentication,
  alert,
  form: formReducer,
})

export default rootReducer
