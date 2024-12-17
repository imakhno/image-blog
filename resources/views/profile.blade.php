<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

<!-- Навигация -->
@include('navigation.nav')

<!-- Личный кабинет -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Боковое меню -->
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" onclick="showSection('myDataSection', this)">Мои данные</a>
                <a href="#" class="list-group-item list-group-item-action active" onclick="showSection('likesSection', this)">Мои лайки</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showSection('commentsSection', this)">Мои лайкнутые комментарии</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showSection('uploadSection', this)">Загрузить изображение</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showSection('myPostsSection', this)">Мои посты</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showSection('uploadedPhotosSection', this)">Загруженные фотографии</a>
            </div>
        </div>

        <div class="col-md-9">

            <!-- Раздел "Мои данные" -->
            <div id="myDataSection" class="section" style="display: none;">
                <div class="card mb-4">
                    <div class="card-header">
                        Мои данные
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Информация о пользователе</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . Auth::user()->image_path) }}" class="img-fluid rounded-circle" alt="Аватар">
                            </div>
                            <div class="col-md-8">
                                <p><strong>Имя: </strong>{{ $userDTO->getName() }}</p>
                                <p><strong>Фамилия: </strong> {{ $userDTO->getSurname() }}</p>
                                <p><strong>Почта: </strong> {{ $userDTO->getEmail() }}</p>
                                <form action="{{ route('logout.destroy') }}" method="post" class="col-md-4">
                                    @csrf
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Выйти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Раздел "Мои лайки" -->
            <div id="likesSection" class="section" style="display: block;">
                <div class="card mb-4">
                    <div class="card-header">
                        Мои лайки
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Изображения, которые я лайкал</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Изображение 1</p>
                                        <p class="text-muted">Автор: Иван</p>
                                        <p class="text-muted">Лайков: 10</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Изображение 2</p>
                                        <p class="text-muted">Автор: Анна</p>
                                        <p class="text-muted">Лайков: 15</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Пагинация -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <span class="page-link">Предыдущая</span>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">Следующая</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Раздел "Мои лайкнутые комментарии" -->
            <div id="commentsSection" class="section" style="display: none;">
                <div class="card mb-4">
                    <div class="card-header">
                        Мои лайкнутые комментарии
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Комментарии, которые я лайкал</h5>
                        <div class="list-group">
                            <div class="list-group-item">
                                <p><strong>Комментарий 1:</strong> Отличное изображение!</p>
                            </div>
                            <div class="list-group-item">
                                <p><strong>Комментарий 2:</strong> Прекрасное место для путешествий!</p>
                            </div>
                        </div>

                        <!-- Пагинация -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <span class="page-link">Предыдущая</span>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">Следующая</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Раздел "Загрузить изображение" -->
            <div id="uploadSection" class="section" style="display: none;">
                <div class="card mb-4">
                    <div class="card-header">
                        Загрузить изображение
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Выберите изображение для загрузки</h5>
                        <form>
                            <div class="mb-3">
                                <label for="imageUpload" class="form-label">Выберите изображение</label>
                                <input type="file" class="form-control" id="imageUpload" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="imageFilters" class="form-label">Выберите фильтр</label>
                                <select class="form-select" id="imageFilters">
                                    <option value="filter1">Фильтр 1</option>
                                    <option value="filter2">Фильтр 2</option>
                                    <option value="filter3">Фильтр 3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Загрузить изображение</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Раздел "Мои посты" -->
            <div id="myPostsSection" class="section" style="display: none;">
                <div class="card mb-4">
                    <div class="card-header">
                        Мои посты
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Посты пользователя</h5>
                        <p>Здесь будут отображаться мои посты.</p>
                    </div>
                </div>
            </div>

            <!-- Раздел "Загруженные фотографии" -->
            <div id="uploadedPhotosSection" class="section" style="display: none;">
                <div class="card mb-4">
                    <div class="card-header">
                        Загруженные фотографии
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Загруженные фотографии</h5>
                        <p>Здесь будут отображаться все мои загруженные фотографии.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function showSection(sectionId, element) {
        // Скрываем все секции
        var sections = document.querySelectorAll('.section');
        sections.forEach(function (section) {
            section.style.display = 'none';
        });

        // Показываем нужную секцию
        document.getElementById(sectionId).style.display = 'block';

        // Меняем активный класс в боковом меню
        var navItems = document.querySelectorAll('.list-group-item');
        navItems.forEach(function (item) {
            item.classList.remove('active');
        });
        element.classList.add('active');
    }

    // Изначально показываем раздел "Мои лайки"
    showSection('myDataSection', document.querySelector('.list-group-item'));
</script>

<!-- Подключение Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
