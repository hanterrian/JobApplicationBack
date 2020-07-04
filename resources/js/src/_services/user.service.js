import { authHeader } from '../_helpers'

export const userService = {
  login,
  logout,
}

function login (email, password, remember) {
  return axios.post(`/api/auth/login`, { 'email': email, 'password': password, 'remember': remember }).then(handleResponse).then(user => {
    if (user.token) {
      localStorage.setItem('user', JSON.stringify(user))
    }

    return user
  })
}

function logout () {
  localStorage.removeItem('user')
}

function handleResponse (response) {
  return response.text().then(text => {
    const data = text && JSON.parse(text)
    if (!response.ok) {
      if (response.status === 401) {
        // auto logout if 401 response returned from api
        logout()
        location.reload(true)
      }

      const error = (data && data.message) || response.statusText
      return Promise.reject(error)
    }

    return data
  })
}
