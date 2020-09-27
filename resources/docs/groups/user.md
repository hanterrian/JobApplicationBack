# User


## Get current user profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/user/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/user/profile"
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
        "id": 9,
        "name": "Scribe",
        "last_name": null,
        "patronymic": null,
        "description": null,
        "gender": null,
        "photo": null,
        "date_of_birth": null,
        "company_type": null,
        "company_name": null,
        "company_site": null,
        "country": null,
        "region": null,
        "city": null,
        "user": {
            "id": 18,
            "email": "scribe@locale.dev",
            "phone": null
        },
        "socialLinks": []
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/user/profile`**



## Update current user profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://job.locale/api/v1/user/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "name=ad" \
    -F "last_name=omnis" \
    -F "patronymic=nostrum" \
    -F "description=eaque" \
    -F "gender=1" \
    -F "date_of_birth=2020-09-27" \
    -F "company_type=personal" \
    -F "company_name=cumque" \
    -F "company_site=http://cassin.com/recusandae-libero-dolorum-voluptatum-nulla-quisquam-rerum.html" \
    -F "country=sequi" \
    -F "region=aut" \
    -F "city=cum" \
    -F "photo=@C:\OpenServer\userdata\temp\phpA3BC.tmp" 
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/user/profile"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'ad');
body.append('last_name', 'omnis');
body.append('patronymic', 'nostrum');
body.append('description', 'eaque');
body.append('gender', '1');
body.append('date_of_birth', '2020-09-27');
body.append('company_type', 'personal');
body.append('company_name', 'cumque');
body.append('company_site', 'http://cassin.com/recusandae-libero-dolorum-voluptatum-nulla-quisquam-rerum.html');
body.append('country', 'sequi');
body.append('region', 'aut');
body.append('city', 'cum');
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
    "message": "Server Error"
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
    



