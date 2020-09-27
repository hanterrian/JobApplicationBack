# Order


## Get list orders




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/order/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/order"
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
            "id": 2,
            "type": "request",
            "title": "Тест",
            "description": "Test order",
            "service_provision": "offline",
            "price": 100,
            "desired_date": "2020-08-16",
            "desired_time_from": "08:16:22",
            "desired_time_to": "08:16:22",
            "execution_address": null,
            "address": "Address",
            "executor_comment": null,
            "customer_comment": null,
            "status": "open",
            "created_at": "2020-08-16T08:17:59.000000Z",
            "author": {
                "id": 13,
                "name": "Admin",
                "email": "hanterrian@gmail.com",
                "phone": null,
                "last_name": "Last",
                "patronymic": "Patronymic",
                "description": "Test description",
                "gender": "Male",
                "date_of_birth": "1989-07-15",
                "company_type": "personal",
                "company_name": null,
                "company_site": null,
                "last_activity": "2020-08-09 10:48:58",
                "country": {
                    "id": 1,
                    "title": "Test country"
                },
                "region": {
                    "id": 1,
                    "title": "Test region"
                },
                "city": {
                    "id": 1,
                    "title": "Test region"
                }
            },
            "currency": {
                "id": 1,
                "title": "UAH"
            },
            "country": {
                "id": 1,
                "title": "Test country"
            },
            "region": {
                "id": 1,
                "title": "Test region"
            },
            "city": {
                "id": 1,
                "title": "Test city"
            },
            "images": [
                {
                    "id": 1,
                    "src": "http:\/\/job.locale\/storage\/order\/files\/3779a00d7aecc40c5155fe09b32dd559.gif"
                }
            ],
            "categories": [
                {
                    "id": 1,
                    "title": "Тест en"
                },
                {
                    "id": 3,
                    "title": "Test 2"
                }
            ]
        },
        {
            "id": 3,
            "type": "request",
            "title": "asdfgfgdg",
            "description": "asdasd",
            "service_provision": "online",
            "price": 100,
            "desired_date": "2020-01-01",
            "desired_time_from": "00:00:00",
            "desired_time_to": "23:59:59",
            "execution_address": "asasas",
            "address": "asasas",
            "executor_comment": null,
            "customer_comment": null,
            "status": "open",
            "created_at": "2020-09-13T06:08:57.000000Z",
            "author": {
                "id": 13,
                "name": "Admin",
                "email": "hanterrian@gmail.com",
                "phone": null,
                "last_name": "Last",
                "patronymic": "Patronymic",
                "description": "Test description",
                "gender": "Male",
                "date_of_birth": "1989-07-15",
                "company_type": "personal",
                "company_name": null,
                "company_site": null,
                "last_activity": "2020-08-09 10:48:58",
                "country": {
                    "id": 1,
                    "title": "Test country"
                },
                "region": {
                    "id": 1,
                    "title": "Test region"
                },
                "city": {
                    "id": 1,
                    "title": "Test region"
                }
            },
            "currency": null,
            "country": null,
            "region": null,
            "city": null,
            "images": [],
            "categories": []
        },
        {
            "id": 6,
            "type": "request",
            "title": "asdfgfgdg",
            "description": "asdasd",
            "service_provision": "online",
            "price": 100,
            "desired_date": "2020-01-01",
            "desired_time_from": "00:00:00",
            "desired_time_to": "23:59:59",
            "execution_address": "asasas",
            "address": "asasas",
            "executor_comment": null,
            "customer_comment": null,
            "status": "open",
            "created_at": "2020-09-13T06:18:53.000000Z",
            "author": {
                "id": 13,
                "name": "Admin",
                "email": "hanterrian@gmail.com",
                "phone": null,
                "last_name": "Last",
                "patronymic": "Patronymic",
                "description": "Test description",
                "gender": "Male",
                "date_of_birth": "1989-07-15",
                "company_type": "personal",
                "company_name": null,
                "company_site": null,
                "last_activity": "2020-08-09 10:48:58",
                "country": {
                    "id": 1,
                    "title": "Test country"
                },
                "region": {
                    "id": 1,
                    "title": "Test region"
                },
                "city": {
                    "id": 1,
                    "title": "Test region"
                }
            },
            "currency": null,
            "country": null,
            "region": null,
            "city": null,
            "images": [
                {
                    "id": 6,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_0.png"
                },
                {
                    "id": 7,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_1.webp"
                }
            ],
            "categories": [
                {
                    "id": 1,
                    "title": "Тест en"
                }
            ]
        },
        {
            "id": 7,
            "type": "request",
            "title": "asdfgfgdg",
            "description": "asdasd",
            "service_provision": "online",
            "price": 100,
            "desired_date": "2020-01-01",
            "desired_time_from": "00:00:00",
            "desired_time_to": "23:59:59",
            "execution_address": "asasas",
            "address": "asasas",
            "executor_comment": null,
            "customer_comment": null,
            "status": "open",
            "created_at": "2020-09-13T06:21:53.000000Z",
            "author": {
                "id": 13,
                "name": "Admin",
                "email": "hanterrian@gmail.com",
                "phone": null,
                "last_name": "Last",
                "patronymic": "Patronymic",
                "description": "Test description",
                "gender": "Male",
                "date_of_birth": "1989-07-15",
                "company_type": "personal",
                "company_name": null,
                "company_site": null,
                "last_activity": "2020-08-09 10:48:58",
                "country": {
                    "id": 1,
                    "title": "Test country"
                },
                "region": {
                    "id": 1,
                    "title": "Test region"
                },
                "city": {
                    "id": 1,
                    "title": "Test region"
                }
            },
            "currency": null,
            "country": null,
            "region": null,
            "city": null,
            "images": [
                {
                    "id": 8,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_0.png"
                },
                {
                    "id": 9,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_1.webp"
                }
            ],
            "categories": [
                {
                    "id": 1,
                    "title": "Тест en"
                }
            ]
        },
        {
            "id": 8,
            "type": "request",
            "title": "asdfgfgdg",
            "description": "asdasd",
            "service_provision": "online",
            "price": 100,
            "desired_date": "2020-01-01",
            "desired_time_from": "00:00:00",
            "desired_time_to": "23:59:59",
            "execution_address": "asasas",
            "address": "asasas",
            "executor_comment": null,
            "customer_comment": null,
            "status": "open",
            "created_at": "2020-09-13T06:22:29.000000Z",
            "author": {
                "id": 13,
                "name": "Admin",
                "email": "hanterrian@gmail.com",
                "phone": null,
                "last_name": "Last",
                "patronymic": "Patronymic",
                "description": "Test description",
                "gender": "Male",
                "date_of_birth": "1989-07-15",
                "company_type": "personal",
                "company_name": null,
                "company_site": null,
                "last_activity": "2020-08-09 10:48:58",
                "country": {
                    "id": 1,
                    "title": "Test country"
                },
                "region": {
                    "id": 1,
                    "title": "Test region"
                },
                "city": {
                    "id": 1,
                    "title": "Test region"
                }
            },
            "currency": {
                "id": 1,
                "title": "UAH"
            },
            "country": {
                "id": 1,
                "title": "Test country"
            },
            "region": {
                "id": 1,
                "title": "Test region"
            },
            "city": {
                "id": 1,
                "title": "Test city"
            },
            "images": [
                {
                    "id": 10,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_0.png"
                },
                {
                    "id": 11,
                    "src": "http:\/\/job.locale\/storage\/order\/2020\/09\/13\/13_order_1.webp"
                }
            ],
            "categories": [
                {
                    "id": 1,
                    "title": "Тест en"
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/v1\/order\/order?page=1",
        "last": "http:\/\/localhost\/api\/v1\/order\/order?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost\/api\/v1\/order\/order?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next",
                "active": false
            }
        ],
        "path": "http:\/\/localhost\/api\/v1\/order\/order",
        "per_page": 15,
        "to": 5,
        "total": 5
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/order/order`**



## Show order




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/order/order/{order}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/order/{order}"
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
    "http://job.locale/api/v1/order/order" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d ''

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/order"
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
    "http://job.locale/api/v1/order/order/{order}" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d ''

```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/order/{order}"
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
    "http://job.locale/api/v1/order/order/{order}" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/order/{order}"
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



## Currency list




> Example request:

```bash
curl -X GET \
    -G "http://job.locale/api/v1/order/currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/currency"
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
    -G "http://job.locale/api/v1/order/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://job.locale/api/v1/order/category"
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




