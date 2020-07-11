import React from 'react'

import { BrowserRouter as Router, Switch, Route } from 'react-router-dom'
import { connect } from 'react-redux'

import { Container, CssBaseline } from '@material-ui/core'

import { history } from '../_helpers'

import { PrivateRoute } from '../_components'

import Home from '../pages/Home'
import Login from '../pages/Login'
import Register from '../pages/Register'
import Profile from '../pages/Profile'
import NotFound from '../pages/NotFound'

class App extends React.Component {
  constructor (props) {
    super(props)
  }

  render () {
    return (
      <Router>
        <Container>
          <CssBaseline/>
          <Switch>
            <Route exact={true} path='/' component={Home}/>
            <Route path='/login' component={Login}/>
            <Route path='/register' component={Register}/>
            <PrivateRoute path='/profile' component={Profile}/>
          </Switch>
        </Container>
      </Router>
    )
  }
}

const connectedApp = connect()(App)

export { connectedApp as App }
