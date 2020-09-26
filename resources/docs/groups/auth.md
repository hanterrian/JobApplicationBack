# Auth


## api/v1/auth/register




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"role":"executor","email":"ymarks@example.com","password":"qui","country_id":"quia","region_id":"corporis","city_id":"laborum","name":"reprehenderit","last_name":"aut","patronymic":"fuga","phone":"perspiciatis","description":"et","gender":"2","date_of_birth":"2020-09-26","company_type":"personal","company_name":"quam","company_site":"http:\/\/tromp.com\/","verification_token":"voluptas"}'

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
    "email": "ymarks@example.com",
    "password": "qui",
    "country_id": "quia",
    "region_id": "corporis",
    "city_id": "laborum",
    "name": "reprehenderit",
    "last_name": "aut",
    "patronymic": "fuga",
    "phone": "perspiciatis",
    "description": "et",
    "gender": "2",
    "date_of_birth": "2020-09-26",
    "company_type": "personal",
    "company_name": "quam",
    "company_site": "http:\/\/tromp.com\/",
    "verification_token": "voluptas"
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
    



## api/v1/auth/register-check




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



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register-check`**



## api/v1/auth/register-token




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/register-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"velva08@example.net"}'

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
    "email": "velva08@example.net"
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



## api/v1/auth/login




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"user@dev.dev","password":"********","remember_me":false,"verification_token":"autem"}'

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
    "verification_token": "autem"
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



## api/v1/auth/login-token




> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/auth/login-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"gulgowski.kelvin@example.org"}'

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
    "email": "gulgowski.kelvin@example.org"
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



## api/v1/auth/logout

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




