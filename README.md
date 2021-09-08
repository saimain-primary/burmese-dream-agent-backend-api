### Burmese Dream API Documentation
---
Contents
- [Login](#Login)
- [Categories](#Categories)
### Open Endpoints
---
Open endpoints require no Authentication.

<div id="Login"></div>

#### Login : <code>POST /api/login</code>  
| Parameter   | Type | Description | Example | Required |
| ----------- | ----------- | ----------- | ----- | ----- |
| agent_id | text |unique id of agent| BD-0001 | Yes |
| password | text |  | password123 | Yes |

Response Example

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

<div id="Categories"></div>

#### Categories : <code>POST /api/login</code>  
| Parameter   | Type | Description | Example | Required |
| ----------- | ----------- | ----------- | ----- | ----- |
| agent_id | text |unique id of agent| BD-0001 | :heavy_check_mark: |
| password | text | - | password123 | :heavy_check_mark: |
