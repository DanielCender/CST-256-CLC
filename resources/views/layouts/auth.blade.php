<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="/assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="/assets/css/Login-Box-En.css">
        <link rel="stylesheet" href="/assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="/assets/css/Pretty-Registration-Form.css">
        <link rel="stylesheet" href="/assets/css/styles.css">
				<title>@yield('title')</title>
</head>

<body>
<div align="center">
	<nav class="navbar navbar-dark navbar-expand-lg bg-secondary navigation-clean-button" style="font-size: 14px;">
            <div class="container"><a class="navbar-brand" href="/index">MyNewJob</a><button data-toggle="collapse"
                    class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
		@yield('content')
</div>
</body>

	@yield('scripts')
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</html>
