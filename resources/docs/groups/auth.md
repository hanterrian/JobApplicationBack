# Auth


## Check email|phone token




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/register-check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/register-check"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Do nothing"
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register-check`**



## Resend register email|phone token




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/register-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"cvandervort@example.org"}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/register-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "cvandervort@example.org"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Token send"
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register-token`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Login user




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"user@dev.dev","password":"********","remember_me":false,"verification_token":"eos"}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "user@dev.dev",
    "password": "********",
    "remember_me": false,
    "verification_token": "eos"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "You cannot sign with those credentials",
    "errors": "Unauthorised"
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/login`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    User email.

<code><b>password</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    User password.

<code><b>remember_me</b></code>&nbsp; <small>boolean</small>         <i>optional</i>    <br>
    Remember user to month.

<code><b>verification_token</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Do nothing.



## Check login email|phone token




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/login-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ruecker.kay@example.org"}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/login-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ruecker.kay@example.org"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "User not found"
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/login-token`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Logout user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "You are successfully logged out"
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/logout`**




