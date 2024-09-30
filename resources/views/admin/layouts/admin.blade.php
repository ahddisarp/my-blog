<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
   <nav>
        <!-- Your navigation items -->

        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endif
    </nav>
  <div class="container-fluid">
    <div class="row">
      @include('partials.sidebar') <!-- Include sidebar -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        @yield('content')
      </main>
    </div>
  </div>
  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
