import React from 'react'
import { render } from 'react-dom'
import { Lines } from 'react-preloaders'

import { Provider } from 'react-redux'

import { store } from './_helpers'
import { App } from './App'

render(
  <Provider store={store}>
    <React.Fragment>
      <App/>
      <Lines/>
    </React.Fragment>
  </Provider>,
  document.getElementById('app'),
)
