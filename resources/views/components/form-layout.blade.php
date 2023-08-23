@props([
    'Formulario'=>'Actualiza'
])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>{{$Formulario}}</title>
</head>
<body>
<x-forms vista="{{$Formulario}}"/>
<script>
    function ver() {
        let passwordField = document.getElementById("password");
        let passwordToggle = document.getElementById("passwordToggle");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.className = "fa fa-eye-slash";
        } else {
            passwordField.type = "password";
            passwordToggle.className = "fa fa-eye";
        }
    }
</script>
</body>
</html>
