# Auth


## Register new user




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"role":"excepturi","email":"nam","password":"et","country_id":3,"region_id":14,"city_id":20,"name":"quis","last_name":"nostrum","patronymic":"enim","phone":"dolorum","description":"libero","gender":12,"date_of_birth":"ea","company_type":"sed","company_name":"saepe","company_site":"neque","password_confirmation":"eum"}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "role": "excepturi",
    "email": "nam",
    "password": "et",
    "country_id": 3,
    "region_id": 14,
    "city_id": 20,
    "name": "quis",
    "last_name": "nostrum",
    "patronymic": "enim",
    "phone": "dolorum",
    "description": "libero",
    "gender": 12,
    "date_of_birth": "ea",
    "company_type": "sed",
    "company_name": "saepe",
    "company_site": "neque",
    "password_confirmation": "eum"
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
        "role": [
            "The selected role is invalid."
        ],
        "email": [
            "The email must be a valid email address."
        ],
        "password": [
            "The password must be at least 8 characters.",
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
        ],
        "gender": [
            "The selected gender is invalid."
        ],
        "date_of_birth": [
            "The date of birth does not match the format Y-m-d."
        ],
        "company_type": [
            "The selected company type is invalid."
        ],
        "company_site": [
            "The company site format is invalid."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>role</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>email</b></code>&nbsp; <small>email</small>         <i>optional</i>    <br>
    

<code><b>password</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>country_id</b></code>&nbsp; <small>integer</small>         <i>optional</i>    <br>
    

<code><b>region_id</b></code>&nbsp; <small>integer</small>         <i>optional</i>    <br>
    

<code><b>city_id</b></code>&nbsp; <small>integer</small>         <i>optional</i>    <br>
    

<code><b>name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>last_name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>phone</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>gender</b></code>&nbsp; <small>integer</small>         <i>optional</i>    <br>
    

<code><b>date_of_birth</b></code>&nbsp; <small>date</small>         <i>optional</i>    <br>
    

<code><b>company_type</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>company_name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>company_site</b></code>&nbsp; <small>url</small>         <i>optional</i>    <br>
    

<code><b>password_confirmation</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Resend register email|phone token




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/register-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"marilou.nolan@example.org"}'

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
    "email": "marilou.nolan@example.org"
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
    -d '{"email":"user@dev.dev","password":"********","remember_me":false,"verification_token":"impedit"}'

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
    "verification_token": "impedit"
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



## Check token




> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/auth/login-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"voluptatem","token":"ut","remember_me":true}'

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
    "email": "voluptatem",
    "token": "ut",
    "remember_me": true
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
        "email": [
            "The email must be a valid email address."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/login-token`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>token</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>remember_me</b></code>&nbsp; <small>boolean</small>         <i>optional</i>    <br>
    



## Get list of verification providers




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/auth/verification-methods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/auth/verification-methods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "items": {
        "email": "Email"
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/auth/verification-methods`**



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




