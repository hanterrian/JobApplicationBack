# Order


## Get list orders




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/order/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order"
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


> Example response (500):

```json
{
    "message": "Whoops, looks like something went wrong",
    "status": 500
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/order/order`**



## Show order




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/order/order/{order}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/{order}"
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
 **`api/v1/order/order/{order}`**



## Create new order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/order/order" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d ''

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = 

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
        "type": [
            "The type field is required."
        ],
        "title": [
            "The title field is required."
        ],
        "description": [
            "The description field is required."
        ],
        "service_provision": [
            "The service provision field is required."
        ],
        "price": [
            "The price field is required."
        ],
        "desired_date": [
            "The desired date field is required."
        ],
        "desired_time_from": [
            "The desired time from field is required."
        ],
        "desired_time_to": [
            "The desired time to field is required."
        ],
        "currency": [
            "The currency field is required."
        ],
        "country": [
            "The country field is required."
        ],
        "region": [
            "The region field is required."
        ],
        "city": [
            "The city field is required."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/order/order`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>type</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>request</code> or <code>service</code>.

<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>service_provision</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>online</code> or <code>offline</code>.

<code><b>price</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>desired_date</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format Y-m-d.

<code><b>desired_time_from</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format H:i:s.

<code><b>desired_time_to</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format H:i:s.

<code><b>execution_address</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>address</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>currency</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>country</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>region</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>city</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>images.*</b></code>&nbsp; <small>file</small>         <i>optional</i>    <br>
    The value must be an image.

<code><b>categories.*</b></code>&nbsp; <small>string</small>     <br>
    



## Update order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://job.cijworld.com/api/v1/order/order/{order}" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d ''

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/{order}"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = 

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
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
<small class="badge badge-darkblue">PUT</small>
 **`api/v1/order/order/{order}`**

<small class="badge badge-purple">PATCH</small>
 **`api/v1/order/order/{order}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>type</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>request</code> or <code>service</code>.

<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>service_provision</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>online</code> or <code>offline</code>.

<code><b>price</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>desired_date</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format Y-m-d.

<code><b>desired_time_from</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format H:i:s.

<code><b>desired_time_to</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date in the format H:i:s.

<code><b>execution_address</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>address</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>currency</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>country</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>region</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>city</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>images.*</b></code>&nbsp; <small>file</small>         <i>optional</i>    <br>
    The value must be an image.

<code><b>categories.*</b></code>&nbsp; <small>string</small>     <br>
    



## Delete order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://job.cijworld.com/api/v1/order/order/{order}" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/{order}"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
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
<small class="badge badge-red">DELETE</small>
 **`api/v1/order/order/{order}`**



## Add executor to order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/order/order/add-executor" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"order":18}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/add-executor"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order": 18
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
        "order": [
            "The selected order is invalid."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/order/order/add-executor`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>order</b></code>&nbsp; <small>integer</small>     <br>
    



## Remove executor from order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/order/order/remove-executor" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"order":15}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/remove-executor"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order": 15
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
        "order": [
            "The selected order is invalid."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/order/order/remove-executor`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>order</b></code>&nbsp; <small>integer</small>     <br>
    



## Select executor to order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/order/order/select-executor" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"order":18}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/select-executor"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order": 18
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
        "order": [
            "The selected order is invalid."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/order/order/select-executor`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>order</b></code>&nbsp; <small>integer</small>     <br>
    



## Add viewer to order

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://job.cijworld.com/api/v1/order/order/add-view" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"order":10}'

```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/order/add-view"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order": 10
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
        "order": [
            "The selected order is invalid."
        ]
    },
    "status": 422
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/order/order/add-view`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>order</b></code>&nbsp; <small>integer</small>     <br>
    



## Currency list




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/order/currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/currency"
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
            "title": "UAH"
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/order/currency`**



## Get category list




> Example request:

```bash
curl -X GET \
    -G "https://job.cijworld.com/api/v1/order/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://job.cijworld.com/api/v1/order/category"
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
            "title": "Тест en",
            "children": {
                "data": [
                    {
                        "id": 2,
                        "title": "Test 1"
                    },
                    {
                        "id": 3,
                        "title": "Test 2"
                    }
                ]
            }
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/order/category`**




