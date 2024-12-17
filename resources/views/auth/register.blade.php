<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
    @include('navigation.nav')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Регистрация</h2>
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="first_name"
                                       name="name"
                                       placeholder="Введите имя" >
                                @error('name')
                                <span style="color: red; font-weight: bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="last_name"
                                       name="surname"
                                       placeholder="Введите фамилию" >
                                @error('surname')
                                <span style="color: red; font-weight: bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                       name="email"
                                       placeholder="Введите email" >
                                @error('email')
                                <span style="color: red; font-weight: bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" class="form-control" id="password"
                                       name="password"
                                       placeholder="Введите пароль" >
                                @error('password')
                                <span style="color: red; font-weight: bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                                <input type="password" class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation" placeholder="Повторите пароль" >
                                @error('password_confirmation')
                                <span style="color: red; font-weight: bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                            </div>

                            <p class="text-center mt-3">
                                Уже есть аккаунт? <a href="{{ route('login') }}" class="text-decoration-none">Войти</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

