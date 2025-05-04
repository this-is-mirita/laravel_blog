<template> <!-- Открываем шаблон, который описывает структуру HTML-страницы -->
    <div class="row mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <h1>Список категорий:</h1>  <!-- Заголовок -->
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>id</th>
                            <th>Название</th>
                            <th colspan="3">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="category in categories" :key="category.id" class="text-center">
                            <td>{{ category.id }}</td>  <!-- Отображаем id категории -->
                            <td>{{ category.title }}</td>  <!-- Отображаем название категории -->
                            <td class="text-center">
                                <a :href="'/admin/categories/' + category.id">
                                    <i class="nav-icon far fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="text-success" :href="'/admin/categories/' + category.id + '/edit'">
                                    <i class="nav-icon fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <form :action="'/admin/categories/' + category.id" method="POST">
                                    <input type="hidden" name="_token" :value="csrfToken">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="nav-icon fas fa-trash text-danger" role="button"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {  // Экспортируем компонент
    data() {  // Функция data возвращает начальные данные компонента
        return {
            categories: [],  // Инициализируем пустой массив для хранения категорий
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        };
    },
    async created() {  // Метод жизненного цикла Vue, который вызывается при создании компонента
        const response = await fetch('/api/');  // Асинхронный запрос на сервер для получения данных
        this.categories = await response.json();  // Преобразуем ответ в формат JSON и сохраняем в массив categories
        console.log(this.categories);  // Логируем полученные данные
    }
};
</script>
