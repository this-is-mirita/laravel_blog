<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>course vue/laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css') }}">
    @vite('resources/js/app.js') <!-- важно! -->
</head>
<body>
{{--vue шаблон--}}
<div id="app"></div>

</body>
</html>
<script>

   const User = function (email, pass){
        this.email = email
   }
   const user1 = new User('qwe','qwe')
   console.log(user1)
</script>
