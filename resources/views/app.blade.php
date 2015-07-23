
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/tweaks.css">
    <link href="/BootstrapFormHelpers-master/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>




</head>
<body>

    @include('navigation.navbar')

<div class="container">

    @yield('content')

</div>


<script src="/js/bootstrap.js"></script>
<script src="/js/functionality.js"></script>
<script src="/BootstrapFormHelpers-master/dist/js/bootstrap-formhelpers.min.js"></script>
<script src="/BootstrapFormHelpers-master/js/bootstrap-formhelpers-colorpicker.js"></script>



<script>

    var delay = function() {

            $('div.alert').delay(3000).slideUp();

    };

    delay();

</script>

    @yield('additionaljs')

</body>
</html>