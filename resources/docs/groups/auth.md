# Auth


## Register new user




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"role":"executor","email":"letha48@example.net","password":"perspiciatis","country_id":"omnis","region_id":"aut","city_id":"reiciendis","name":"sit","last_name":"accusamus","patronymic":"laboriosam","phone":"velit","description":"adipisci","gender":"1","date_of_birth":"2020-09-27","company_type":"personal","company_name":"vel","company_site":"http:\/\/heathcote.net\/nam-eligendi-ut-ut-sequi-iusto-corporis-quos","verification_token":"magnam"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "role": "executor",
    "email": "letha48@example.net",
    "password": "perspiciatis",
    "country_id": "omnis",
    "region_id": "aut",
    "city_id": "reiciendis",
    "name": "sit",
    "last_name": "accusamus",
    "patronymic": "laboriosam",
    "phone": "velit",
    "description": "adipisci",
    "gender": "1",
    "date_of_birth": "2020-09-27",
    "company_type": "personal",
    "company_name": "vel",
    "company_site": "http:\/\/heathcote.net\/nam-eligendi-ut-ut-sequi-iusto-corporis-quos",
    "verification_token": "magnam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "password": [
            "The password confirmation does not match."
        ],
        "country_id": [
            "The selected country id is invalid."
        ],
        "region_id": [
            "The selected region id is invalid."
        ],
        "city_id": [
            "The selected city id is invalid."
        ]
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>role</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>customer</code> or <code>executor</code>.

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.

<code><b>password</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>country_id</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>region_id</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>city_id</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>last_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>phone</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>gender</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>1</code> or <code>2</code>.

<code><b>date_of_birth</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format Y-m-d.

<code><b>company_type</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>personal</code> or <code>company</code>.

<code><b>company_name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>company_site</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The value must be a valid URL.

<code><b>verification_token</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Check email|phone token




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/register-check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/register-check"
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
    "http://job.locale/api/v1/auth/register-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"letitia74@example.org"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/register-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "letitia74@example.org"
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
    "http://job.locale/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"user@dev.dev","password":"********","remember_me":false,"verification_token":"accusantium"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "user@dev.dev",
    "password": "********",
    "remember_me": false,
    "verification_token": "accusantium"
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
    "http://job.locale/api/v1/auth/login-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"tcrona@example.org"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/login-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "tcrona@example.org"
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
    "http://job.locale/api/v1/auth/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/auth/logout"
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




