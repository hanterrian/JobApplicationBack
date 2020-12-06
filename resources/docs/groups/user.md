# User


## Get current user profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/user/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/user/profile"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    "data": {
        "id": 18,
        "name": "Scribe",
        "email": "scribe@locale.dev",
        "phone": null,
        "last_name": null,
        "patronymic": null,
        "description": null,
        "gender": null,
        "date_of_birth": null,
        "company_type": null,
        "company_name": null,
        "company_site": null,
        "last_activity": null,
        "country": null,
        "region": null,
        "city": null
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/user/profile`**



## Get user profile




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/user/profile/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/user/profile/{user}"
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


> Example response (404):

```json
{
    "message": "Not Found",
    "status": 404
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/user/profile/{user}`**



## Update current user profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/user/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "name=nemo" \
    -F "last_name=eius" \
    -F "patronymic=consequatur" \
    -F "description=est" \
    -F "gender=1" \
    -F "date_of_birth=2020-12-06" \
    -F "company_type=company" \
    -F "company_name=tempora" \
    -F "company_site=http://www.trantow.com/corporis-officia-fuga-et-placeat-consequuntur-blanditiis-mollitia.html" \
    -F "country=natus" \
    -F "region=aut" \
    -F "city=ea" \
    -F "photo=@C:\OpenServer\userdata\temp\php4B92.tmp" 
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/user/profile"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'nemo');
body.append('last_name', 'eius');
body.append('patronymic', 'consequatur');
body.append('description', 'est');
body.append('gender', '1');
body.append('date_of_birth', '2020-12-06');
body.append('company_type', 'company');
body.append('company_name', 'tempora');
body.append('company_site', 'http://www.trantow.com/corporis-officia-fuga-et-placeat-consequuntur-blanditiis-mollitia.html');
body.append('country', 'natus');
body.append('region', 'aut');
body.append('city', 'ea');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Whoops, looks like something went wrong",
    "status": 500
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/user/profile`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>last_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>gender</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>1</code> or <code>2</code>.

<code><b>photo</b></code>&nbsp; <small>file</small>         <i>optional</i>    <br>
    The value must be an image.

<code><b>date_of_birth</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format Y-m-d.

<code><b>company_type</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>personal</code> or <code>company</code>.

<code><b>company_name</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>company_site</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    The value must be a valid URL.

<code><b>country</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>region</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>city</b></code>&nbsp; <small>string</small>     <br>
    




