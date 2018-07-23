About this app

important routes:
/stock, the task result
/login, to login, for test user: lele@lele.com password: lelele
/home, default laravel home


This is for stock online testing only,

important files:
resources/views/stockPrice/index.blade
app/http/controllers/baseControler , this contains essential code
app/http/models, contains essental models
app/role & app/user, contains model code for use login and basic access control
routes/web.app, contains routes info


Note: db connection string password etc are deliberately taken out, Both DB instance and web app instance are hosted on aws
Note: this was a legacy test laravel app that may contain limited legacy code..

