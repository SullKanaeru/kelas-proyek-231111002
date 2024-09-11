<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }
</style>

<div class="login-container">
    <h2 class="text-center mb-4">Login</h2>
    @if(session('success'))
        <div class="text-center">
            <div class="alert alert-success mx- mt-3" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @elseif(session('fail'))
        <div class="text-center">
            <div class="alert alert-danger mx- mt-3" role="alert">
                {{ session('fail') }}
            </div>
        </div>
    @endif

    <form class="login_form" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control usernameInput" id="username" name="username" placeholder="Username">
        </div>

        @error('username')
            <small>{{ $message }}</small>
        @enderror

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control passwordInput" id="password" name="password" placeholder="Password">
        </div>

        @error('password')
            <small>{{ $message }}</small>
        @enderror

        <button type="button" class="btn btn-primary w-100 login">Login</button>
        <button type="button" class="btn btn-secondary w-100 mt-3 register">Register</button>
    </form>
</div>

<script>
    document.querySelector('.login').addEventListener('click', function() {
        var form = document.querySelector('.login_form');
        form.action = "{{ url('login/new') }}";
        form.submit();
    });

    document.querySelector('.register').addEventListener('click', function() {
        var form = document.querySelector('.login_form');
        form.action = "{{ url('register') }}";
        form.submit();
    });
</script>
