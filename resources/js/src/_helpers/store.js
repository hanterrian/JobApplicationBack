import {
  createStore,
  applyMiddleware, combineReducers,
} from 'redux'
import { reducer as formReducer } from 'redux-form'

import { composeWithDevTools } from 'redux-devtools-extension'

import thunkMiddleware from 'redux-thunk'

export const store = createStore(
  combineReducers({
    form: formReducer,
  }),
  composeWithDevTools(
    applyMiddleware(
      thunkMiddleware,
    ),
  ),
)
