# Yii2-basic-RESTful-API-template
Simple web api with Yii2

Enable debug:
-------------
create file "develop.me" in /config/

Request:
--------
all request using POST or GET method.

POST parameter validate using in controller:
```php
$this->checkParms(["parm1",
  "parm2",.....]);
```

Response:
--------
success reqponse format:
```php
{"data":json object,"status":200}
```
error reqponse format:
```php
{"data":"message","status":status code}
```
example of error output:
```php
throw new \yii\web\HttpException(401, "authentication failed!");
```

