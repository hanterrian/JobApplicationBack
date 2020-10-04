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


> Example response (500):

```json
{
    "message": "Whoops, looks like something went wrong",
    "status": 500
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
    -F "name=et" \
    -F "last_name=incidunt" \
    -F "patronymic=illum" \
    -F "description=et" \
    -F "gender=1" \
    -F "date_of_birth=2020-10-04" \
    -F "company_type=personal" \
    -F "company_name=nobis" \
    -F "company_site=http://www.bogisich.com/blanditiis-aut-vitae-officia-omnis-ut-ea-vitae-exercitationem.html" \
    -F "country=labore" \
    -F "region=quo" \
    -F "city=deserunt" \
    -F "photo=@C:\OpenServer\userdata\temp\phpB82D.tmp" 
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
body.append('name', 'et');
body.append('last_name', 'incidunt');
body.append('patronymic', 'illum');
body.append('description', 'et');
body.append('gender', '1');
body.append('date_of_birth', '2020-10-04');
body.append('company_type', 'personal');
body.append('company_name', 'nobis');
body.append('company_site', 'http://www.bogisich.com/blanditiis-aut-vitae-officia-omnis-ut-ea-vitae-exercitationem.html');
body.append('country', 'labore');
body.append('region', 'quo');
body.append('city', 'deserunt');
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
    




