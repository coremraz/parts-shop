<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KevTek</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8214d79399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="py-4 bg-white shadow-md">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <a href="#" class="text-2xl font-bold">LOGO</a>
        <div class="flex items-center">
            <span class="mr-4 text-gray-600">+7 (812) 200-82-75</span>
            <a href="mailto:info@kevtek.ru" class="mr-4 text-gray-600">info@kevtek.ru</a>
            <div class="dropdown inline-block relative">
                <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                    <span>Русский</span>
                    <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </button>
                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                    <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">English</a></li>
                </ul>
            </div>
        </div>
        <div class="hidden md:flex items-center">
            <a href="#" class="mr-4 text-gray-600">Дилерам</a>
            <a href="#" class="mr-4 text-gray-600">Пользователям</a>
            <a href="#" class="mr-4 text-gray-600">Вопросы и ответы</a>
            <a href="#" class="mr-4 text-gray-600">Контакты</a>
        </div>
        <div class="flex items-center">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                <i class="fas fa-search"></i>
            </button>
            <a href="#" class="mr-2 text-gray-600"><i class="fas fa-user"></i> Войти</a>
            <a href="#" class="mr-2 text-gray-600"><i class="fas fa-clipboard-list"></i> Заказы</a>
            <a href="#" class="mr-2 text-gray-600"><i class="fas fa-heart"></i> Избранное</a>
            <a href="#" class="text-gray-600"><i class="fas fa-shopping-cart"></i> Корзина</a>
        </div>
    </div>
</header>

<nav class="bg-gray-200 py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <button class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            <i class="fas fa-bars mr-2"></i> Каталог
        </button>
        <form class="flex items-center">
            <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-l py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Поиск по каталогу">
            <button class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-r" type="button">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</nav>

<main class="container mx-auto px-4 py-8">

    <!-- Banner -->
    <div class="bg-gray-300 h-64 mb-8 relative">
        <div class="absolute bottom-0 left-0 bg-white p-4 m-4 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Информационный баннер</h2>
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex">
            <span class="bg-gray-500 h-3 w-3 rounded-full mx-1"></span>
            <span class="bg-gray-400 h-3 w-3 rounded-full mx-1"></span>
            <span class="bg-gray-400 h-3 w-3 rounded-full mx-1"></span>
        </div>
    </div>

    <!-- Marketplaces -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/150" alt="Ozon" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">Заказать на OZON</h3>
            <p class="text-gray-600">Полный ассортимент товаров на популярном маркетплейсе</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/150" alt="Yandex Market" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">Заказать на Яндекс Маркет</h3>
            <p class="text-gray-600">Полный ассортимент товаров на популярном маркетплейсе</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/150" alt="VseInstrumenti" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">Скоро</h3>
            <p class="text-gray-600">VseInstrumenti.ru</p>
            <p class="text-gray-600">Полный ассортимент товаров на популярном маркетплейсе</p>
        </div>
    </div>

    <!-- Advantages -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center">
            <i class="fas fa-award text-4xl text-blue-500 mb-4"></i>
            <h3 class="text-lg font-bold mb-2">Консультации и качество</h3>
            <p class="text-gray-600 text-center">Помощь в выборе и подбор товара</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center">
            <i class="fas fa-truck text-4xl text-blue-500 mb-4"></i>
            <h3 class="text-lg font-bold mb-2">Доставка по РФ</h3>
            <p class="text-gray-600 text-center">Деловые линии, СДЭК в любой регион России</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center">
            <i class="fas fa-box-open text-4xl text-blue-500 mb-4"></i>
            <h3 class="text-lg font-bold mb-2">Широкий ассортимент</h3>
            <p class="text-gray-600 text-center">Наша база товаров постоянно пополняется новыми товарами</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center">
            <i class="fas fa-handshake text-4xl text-blue-500 mb-4"></i>
            <h3 class="text-lg font-bold mb-2">Мы являемся официальными дилерами</h3>
            <p class="text-gray-600 text-center">Мы являемся официальными телями крупных производителей</p>
        </div>
    </div>

    <h2 class="text-2xl font-bold mb-8">Популярные товары</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 1" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HSB-006-SE-BK-1L-M25</h3>
            <p class="text-gray-600">K000001854</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 2" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HE-006-TE-CCT-1L-2PG16</h3>
            <p class="text-gray-600">K000000296</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 3" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HA-003-F-BK-1L</h3>
            <p class="text-gray-600">PK000000007</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 4" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HE-006-F-SF-1L-M20</h3>
            <p class="text-gray-600">PK000000181</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 5" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HA-003-SE-BK-1L-MCV-M20</h3>
            <p class="text-gray-600">K000000006</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 6" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HK-008/0-SE-SF-2L-2PG21</h3>
            <p class="text-gray-600">K000003531</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 7" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HSB-006-F-BK-1L</h3>
            <p class="text-gray-600">PK00002441</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Product 8" class="mx-auto mb-4">
            <h3 class="text-lg font-bold mb-2">HK-004/0-M-SE-2B-M25</h3>
            <p class="text-gray-600">PK00002890</p>
        </div>
    </div>

    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">О компании</h2>
            <div class="flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://placeimg.com/640/480/tech" alt="О компании" class="rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Здесь будет располагаться текст о компании, состоящий из нескольких абзацев, характеризующих компанию. Можно рассказать её преимущества, достижения и гарантии. Желательно уже сейчас начать продумывать текст
                    </p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Узнать больше
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Новости</h2>
            <div class="flex flex-col md:flex-row md:-mx-4">
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 1" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Полученный сертификат EAC</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            На продукцию компании Haoke Electrical (ZJHK). Подробнее — в нашей статье
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Подробнее</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 2" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Новые поставщики оборудования</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Каталог сайта пополнен новыми товарами
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Подробнее</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 3" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Haoke Electrical (ZJHK) на выставке ЭЛЕКТРО-2023</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Выставка состоится 6–9 июня 2023 года в Экспоцентре
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Статьи</h2>
            <div class="flex flex-col md:flex-row md:-mx-4">
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 1" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">О промышленных прямоугольных разъёмах</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Корпусы и кожухи прямоугольных разъёмов 3А, 10А, 16А, 32А
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Читать полностью</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 2" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Типы клемм в контактных вставках</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Контактные вставки и способы присоединения проводников к контактным
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Читать полностью</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 3" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Участие ООО «КевТек» в выставке ЭЛЕКТРО-2024</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Выставка состоится 6–9 июня 2023 года в Экспоцентре
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Статьи</h2>
            <div class="flex flex-col md:flex-row md:-mx-4">
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 1" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Подбор элементов промышленного разъёма</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Совместимость компонентов разъёма по типоразмеру
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Читать полностью</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 2" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Информация о сальниковых (кабельных вводах)</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Основная информация о типах сальников и их назначении
                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Читать полностью</a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Новость 3" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Скоро...</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">

                        </p>
                        <a href="#" class="text-blue-500 hover:underline">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Документация</h2>
            <div class="flex flex-col md:flex-row md:-mx-4">
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Тип A" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Тип A</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Корпусы и кожухи прямоугольных разъёмов 3А, 10А, 16А, 32А
                        </p>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" download>
                            Скачать
                        </a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Cерия HA" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Cерия HA</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Компактные контактные вставки промышленных разъемов
                        </p>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" download>
                            Скачать
                        </a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Cерия HE" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Cерия HE</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Стандартные контактные вставки промышленных разъемов
                        </p>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" download>
                            Скачать
                        </a>
                    </div>
                </div>
                <div class="md:w-1/3 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://placeimg.com/640/480/tech" alt="Cерия HEE" class="mb-4">
                        <h3 class="text-lg font-bold mb-2">Cерия HEE</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Контактные вставки промышленных разъемов высокой плотности
                        </p>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" download>
                            Скачать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Производители</h2>
            <div class="flex flex-col md:flex-row md:-mx-4">
                <div class="md:w-1/4 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-bold mb-2"><a href="#" class="text-blue-500 hover:underline">Logo</a></h3>
                    </div>
                </div>
                <div class="md:w-1/4 md:px-4 mb-8 md:mb-0">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-bold mb-2"><a href="#" class="text-blue-500 hover:underline">Logo</a></h3>
                    </div>
                </div>
                <div class="md:w-1/4 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-bold mb-2"><a href="#" class="text-blue-500 hover:underline">Logo</a></h3>
                    </div>
                </div>
                <div class="md:w-1/4 md:px-4">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-bold mb-2"><a href="#" class="text-blue-500 hover:underline">Logo</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->
<footer class="bg-gray-800 py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h4 class="text-white text-lg font-bold mb-4">COMPANY LOGO</h4>
                <p class="text-gray-400">
                    © 2024 ООО «КевТек»
                </p>
            </div>
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h4 class="text-white text-lg font-bold mb-4">Компания</h4>
                <ul class="list-none">
                    <li><a href="#" class="text-gray-400 hover:text-white">Наши преимущества</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Бренды</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Новости</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Контакты</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/3">
                <h4 class="text-white text-lg font-bold mb-4">Контакты</h4>
                <ul class="list-none">
                    <li class="mb-2">
                        <a href="tel:+78122008275" class="text-gray-400 hover:text-white">
                            <i class="fas fa-phone mr-2"></i> +7 812 200-82-75
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@kevtek.ru" class="text-gray-400 hover:text-white">
                            <i class="fas fa-envelope mr-2"></i> info@kevtek.ru
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="bg-gray-200 py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/2 mb-6 md:mb-0">
                <h4 class="text-gray-800 text-lg font-bold mb-4">Подпишитесь на рассылку</h4>
                <p class="text-gray-600">
                    Подпишитесь на рассылку, чтобы быть в курсе новых поступлений и актуальных новостей на рынке промышленного оборудования!
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <form class="flex">
                    <input type="email" placeholder="Введите email" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-l py-2 px-4 block w-full appearance-none leading-normal">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:shadow-outline">
                        Подписаться
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-auto mb-6 md:mb-0">
                <h4 class="text-white text-lg font-bold mb-4">Покупателям</h4>
                <ul class="list-none">
                    <li><a href="#" class="text-gray-400 hover:text-white">Каталог</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Полезные статьи</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Доставка и оплата</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Вопросы и ответы</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Обратная связь</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Возврат или обмен товара</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Гарантия</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Документация</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
