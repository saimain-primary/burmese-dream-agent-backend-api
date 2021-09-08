### Burmese Dream API Documentation

- [Authentication](#Login)
    - [Login](#Login)
    - [Logout](#Logout)
    - [User Details](#UserDetails)
- [Categories](#Categories)
- [Get Category & its Products](#Cagetory)
- [View Cart](#viewCart)
- [Checkout Order](#checkoutOrder)
### Require Authentication

- [User Details](#UserDetails)
- [View Cart](#ViewCart)
- [Checkout Order](#checkoutOrder)
- [Logout](#Logout)

### Open Endpoints

- [Login](#Login)
- [Categories](#Categories)
- [Get Category & its Products](#Cagetory)



<div id="Login"></div>

### Login : <code>POST /api/login</code>  
| Parameter   | Type | Description | Example | Required |
| ----------- | ----------- | ----------- | ----- | ----- |
| agent_id | text |unique id of agent| BD-0001 | Yes |
| password | text |  | password123 | Yes |

#### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": {
        "agent_id": "BD-0001",
        "name": "Mg Mg",
        "email": "mgmg@gmail.com",
        "phone": "09979857473",
        "date_of_birth": "3-8-2000",
        "address": "Kyaukme",
        "group_one_level": null,
        "group_two_level": null,
        "refer_code": "63272",
        "invited_by": null,
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTRmYmQ3ZTAzZWE4YTVmNjk4NGEzY2FiMWE4YmNhZWRhNjNkMzQ4NzAyMTNmMGYzNzkzZjFmNWFlMTNlYzY5ODc5MzUyNzQ5N2JkZmI3NTkiLCJpYXQiOjE2MzEwOTEzMTIuNjMwODcxLCJuYmYiOjE2MzEwOTEzMTIuNjMwODc1LCJleHAiOjE2NjI2MjczMTIuNTc3OTQzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.rSzjfjJNgaNjfPVXoSDctlhUj6nUNIVbcW2expyDHx19jGRLF6c2f82jJ036lFUlK4xiR_9a78oUUCVgp9Dkw-JfOIVNy7bM5Mf6T0V2AvwzjDh8olJBuMPalCO8BkqXuWPjZoEh_D8qm-iwcit-B325kAYY8nE1oQa-6YkoFEeqCMfa5DsdBWrOthwJFA6btSrEbYmKI3DL7qIwapCh4YfhwGiNk0Y_NI4Cqimyj0JS9SOtCGQ3HBmZw_CWUVoi5HFvicztthhCKNXhywvDGQOxren5wc0PU-o6APpU5cEdD9g-REe90cIpgpToNZemtWKp70diqal643Rxeu87JzRWhQHUVI8SDGP4qRi-zgOVxJ3vYOog2LTwGdcZYd3zoL5MHydjjlOojDCJu7T7R7Zvb4i5gOsrlIN--mtaskBceJKY2C9G9jetI_NmPdspiGkxVeVHglmhCqoA8EHnUDn0SdRUFdwmf_ocLBknwVt_321fDNpoiazyiZnge1-0NEafXw9qIJb0fPDlsu-EUa4BlitsK7EaAqVDGTscIilkp8_A3Gj0AnHWC9Oxs8zgZaWRqvuthkx4pzWkMMj9vmiJ70YIUAVBIMaZA1ckda8rvYEhtYfhYpJ7l5ZnBDJCaZOI19BBg1INIgDafQX8leOAuYVEhIpVU8CrVOTwHEM"
    }
}
```

<div id="Logout"></div>

### Logout : <code>POST /api/logout</code>

### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": {
        "message": "Logout Success."
    }
}
```

<div id="UserDetails"></div>

### User Details (Agent) <code>GET /api/user</code>

#### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": {
        "agent_id": "BD-0001",
        "name": "Mg Mg",
        "email": "mgmg@gmail.com",
        "phone": "09979857473",
        "date_of_birth": "3-8-2000",
        "address": "Kyaukme",
        "group_one_level": null,
        "group_two_level": null,
        "refer_code": "63272",
        "invited_by": null
    }
}
```


<div id="Categories"></div>

### Categories : <code>GET /api/categories</code>  

#### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": [
        {
            "id": 1,
            "group": "1",
            "slug": "lip-stick",
            "name": "Lip Stick"
        },
        {
            "id": 2,
            "group": "1",
            "slug": "clay-mask",
            "name": "Clay Mask"
        },
    ]
}
```

<div id="Category"></div>

### Get Category & its Products : <code>GET /api/categories/{slug}</code>  

#### Example Request

<code>Get /api/categories/lip-stick</code>

#### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": {
        "id": 1,
        "group": "1",
        "slug": "lip-stick",
        "name": "Lip Stick",
        "products": [
            {
                "id": 1,
                "code": "8736",
                "slug": "inle",
                "name": "INLE",
                "category": {
                    "slug": "lip-stick",
                    "name": "Lip Stick"
                },
                "description": "A mauve nude tone shade, the Inle is universally flattering—perfect.",
                "price": "8500",
                "wholesale": [
                    {
                        "qty": 12,
                        "price": 7000
                    },
                    {
                        "qty": 24,
                        "price": 6950
                    }
                ],
                "images": [
                    "https://codexmm.us-east-1.linodeobjects.com/BurmeseDream/Products/Images/163103311847.webp",
                    "https://codexmm.us-east-1.linodeobjects.com/BurmeseDream/Products/Images/163103316567.webp",
                ],
                "how_to_use": "Our super-light liquid lipsticks are really easy to apply and dry to a smooth, matte finish. Hydrated and exfoliated lips give the best results.",
                "features": "Easy-application",
                "ingredients": "Polyisobutene, Ethylhexyl Palmitate, Mineral Oil, Caprylic/Capric Triglyceride, Silica, Microcrystalline Wax, Phenoxyethanol, Caprylyl Glycol, Fragrance.",
                "weight": "0.14 FL. OZ / 4 ML",
                "available": 1,
                "url": "http://127.0.0.1:8000/api/products/inle"
            }
        ]
    }
}
```
<div id="viewCart"></div>

### View Cart <code>POST /api/cart</code>

| Parameter   | Type | Description | Example | Required |
| ----------- | ----------- | ----------- | ----- | ----- |
| products | array | array of products and its qty | ```[{"product_id":1,"qty":13},{"product_id":2,"qty":5}]``` | Yes |

#### Response Example

<small>Not Authenticated</small>
```json 
{
    "status": 500,
    "success": false,
    "data": {
        "message": "Unauthenticated."
    }
}
```

<small>Authenticated</small>

```json
{
    "status": 200,
    "success": true,
    "data": {
        "products": [
            {
                "product_id": 1,
                "qty": 13
            },
            {
                "product_id": 2,
                "qty": 5
            },
            {
                "product_id": 3,
                "qty": 10
            },
            {
                "product_id": 4,
                "qty": 40
            }
        ],
        "group_one_total_amount": 143500,
        "group_two_total_amount": 323650,
        "total_amount": 467150
    }
}
```


<div id="checkoutOrder"></div>

### Checkout Order <code>POST /api/order/checkout</code>

| Parameter   | Type | Description | Example | Required |
| ----------- | ----------- | ----------- | ----- | ----- |
| products | array | array of products and its qty | ```[{"product_id":1,"qty":13},{"product_id":2,"qty":5}]``` | Yes |
| payment | text | payment methond | Kpay | Yes |
| payment_slip | image | screenshot of payment success | screenshot.png | Yes |

#### Response Example

```json
{
    "status": 200,
    "success": true,
    "data": {
        "order_id": "BDO-3056",
        "products": "[{\"product_id\":1,\"qty\":13},{\"product_id\":2,\"qty\":5},{\"product_id\":3,\"qty\":10},{\"product_id\":4,\"qty\":40}]",
        "group_one_total_amount": 143500,
        "group_two_total_amount": 323650,
        "total_amount": 467150,
        "payment": "Kpay",
        "ordered_at": "08-09-2021 06:55 PM"
    }
}
```

### Author

justsaimain

- [justaimain]('https://github.com/justsaimain')
- [facebook.com/saimain.dev]('https://facebook.com/saimain.dev')
