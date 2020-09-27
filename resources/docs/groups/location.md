# Location


## Get country list




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/location/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/location/countries"
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
    "data": [
        {
            "id": 1,
            "title": "Test country"
        },
        {
            "id": 2,
            "title": "Test country 2"
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/location/countries`**



## Get region list




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/location/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":"omnis"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/location/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": "omnis"
}

fetch(url, {
    method: "GET",
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
        "country_id": [
            "The selected country id is invalid."
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/location/regions`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>country_id</b></code>&nbsp; <small>string</small>     <br>
    



## Get city list




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/location/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":"officiis","region_id":"quia"}'

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/location/cities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": "officiis",
    "region_id": "quia"
}

fetch(url, {
    method: "GET",
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
        "country_id": [
            "The selected country id is invalid."
        ],
        "region_id": [
            "The selected region id is invalid."
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/location/cities`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>country_id</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>region_id</b></code>&nbsp; <small>string</small>     <br>
    




