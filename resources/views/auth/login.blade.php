<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" type="email" name="email"
                                                placeholder="name@example.com" required autofocus
                                                value="{{ old('email') }}" />

                                            {{-- <select class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" name="email" required autofocus>
                                                <option value="">-- Pilih Email --</option>
                                                <option value="admin@example.com"
                                                    {{ old('email') == 'admin@example.com' ? 'selected' : '' }}>
                                                    admin@example.com</option>
                                                <option value="ketua@example.com"
                                                    {{ old('email') == 'ketua@example.com' ? 'selected' : '' }}>
                                                    ketua@example.com</option>
                                                <option value="bendahara@example.com"
                                                    {{ old('email') == 'bendahara@example.com' ? 'selected' : '' }}>
                                                    bendahara@example.com</option>
                                                <option value="petugas@example.com"
                                                    {{ old('email') == 'petugas@example.com' ? 'selected' : '' }}>
                                                    petugas@example.com</option>
                                                <option value="user@example.com"
                                                    {{ old('email') == 'user@example.com' ? 'selected' : '' }}>
                                                    user@example.com</option>
                                            </select> --}}

                                            <label for="inputEmail">Email address</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" name="password"
                                                placeholder="Password" value="password123" required />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" name="password"
                                                placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                name="remember" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            {{-- <a class="small" href="#">Forgot
                                                Password?</a> --}}
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>

                                    @if ($errors->any())
                                        <div class="mt-3 alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="/register">Need an account? Sign up!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        {{-- <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website {{ date('Y') }}</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
