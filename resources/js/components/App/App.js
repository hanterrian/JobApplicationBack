import React from 'react'

import { Router, Route } from 'react-router-dom'
import { connect } from 'react-redux'
import { history } from '../_helpers'

import Home from '../pages/Home'
import Login from '../pages/Login'
import Register from '../pages/Register'

class App extends React.Component {
  constructor (props) {
    super(props)
  }

  render () {
    return (
      <Router history={history}>
        <Route path='/'>
          <Home/>
        </Route>
        <Route path='/login'>
          <Login/>
        </Route>
        <Route path='/register'>
          <Register/>
        </Route>
      </Router>
    )
  }
}

const connectedApp = connect()(App)

export { connectedApp as App }
