<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Made Easy</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


<!--
<html dir="ltr" lang="en" xml:lang="en" class="yui3-js-enabled"><head>
    <title>Strathmore Graduate Studies</title>
   	<link rel="https://sgs.strathmore.edu/uploads/logo/School-of-Graduate-Studies-logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">    	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="moodle, Strathmore Office of Graduate Studies">
<link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/yui_combo.php/rollup/3.17.2/yui-moodlesimple-min.css"><script charset="utf-8" id="yui_3_17_2_1_1709199945085_8" src="https://sbselearning.strathmore.edu/theme/yui_combo.php/m/1698178576/core/event/event-min.js&amp;m/1698178576/filter_mathjaxloader/loader/loader-min.js" async=""></script><link charset="utf-8" rel="stylesheet" id="yui_3_17_2_1_1709199945085_19" href="https://sbselearning.strathmore.edu/theme/yui_combo.php/3.17.2/cssbutton/cssbutton-min.css"><script charset="utf-8" id="yui_3_17_2_1_1709199945085_20" src="https://sbselearning.strathmore.edu/theme/yui_combo.php/m/1698178576/core/widget/widget-focusafterclose-min.js&amp;3.17.2/plugin/plugin-min.js&amp;m/1698178576/core/lockscroll/lockscroll-min.js&amp;m/1698178576/core/notification/notification-dialogue-min.js&amp;m/1698178576/core/tooltip/tooltip-min.js&amp;m/1698178576/core/popuphelp/popuphelp-min.js" async=""></script><script charset="utf-8" id="yui_3_17_2_1_1709199945085_29" src="https://sbselearning.strathmore.edu/theme/yui_combo.php/m/1698178576/course/categoryexpander/categoryexpander-min.js" async=""></script><script charset="utf-8" id="yui_3_17_2_1_1709199945085_39" src="https://sbselearning.strathmore.edu/theme/yui_combo.php/3.17.2/event-mousewheel/event-mousewheel-min.js&amp;3.17.2/event-resize/event-resize-min.js&amp;3.17.2/event-hover/event-hover-min.js&amp;3.17.2/event-touch/event-touch-min.js&amp;3.17.2/event-move/event-move-min.js&amp;3.17.2/event-flick/event-flick-min.js&amp;3.17.2/event-valuechange/event-valuechange-min.js&amp;3.17.2/event-tap/event-tap-min.js" async=""></script><script charset="utf-8" id="yui_3_17_2_1_1709199945085_181" src="https://cdn.jsdelivr.net/npm/mathjax@2.7.8/MathJax.js?delayStartupUntil=configured" async=""></script><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/styles.php/mb2nl/1698178576_1/all">
<link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/mb2nl/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.min.css">
<link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/mb2nl/assets/bootstrap/css/glyphicons.min.css">
<link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/mb2nl/assets/LineIcons/LineIcons.min.css">
<link rel="stylesheet" type="text/css" href="https://sbselearning.strathmore.edu/theme/mb2nl/assets/OwlCarousel/assets/owl.carousel.min.css">
<script>
//<![CDATA[
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"https:\/\/sbselearning.strathmore.edu","sesskey":"8TKvTe4nTf","sessiontimeout":"1800","themerev":"1698178576","slasharguments":1,"theme":"mb2nl","iconsystemmodule":"core\/icon_system_fontawesome","jsrev":"1698178576","admin":"admin","svgicons":true,"usertimezone":"UTC+3","contextid":2,"langrev":1698178576,"templaterev":"1698178576"};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin')}};
var yui2ConfigFn = function(me) {var parts=me.name.replace(/^moodle-/,'').split('-'),component=parts.shift(),module=parts[0],min='-min';if(/-(skin|core)$/.test(me.name)){parts.pop();me.type='css';min=''}
if(module){var filename=parts.join('-');me.path=component+'/'+module+'/'+filename+min+'.'+me.type}else{me.path=component+'/'+component+'.'+me.type}};
YUI_config = {"debug":false,"base":"https:\/\/sbselearning.strathmore.edu\/lib\/yuilib\/3.17.2\/","comboBase":"https:\/\/sbselearning.strathmore.edu\/theme\/yui_combo.php\/","combine":true,"filter":null,"insertBefore":"firstthemesheet","groups":{"yui2":{"base":"https:\/\/sbselearning.strathmore.edu\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"https:\/\/sbselearning.strathmore.edu\/theme\/yui_combo.php\/","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"https:\/\/sbselearning.strathmore.edu\/theme\/yui_combo.php\/m\/1698178576\/","combine":true,"comboBase":"https:\/\/sbselearning.strathmore.edu\/theme\/yui_combo.php\/","ext":false,"root":"m\/1698178576\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"filter":null,"modules":{"moodle-core-actionmenu":{"requires":["base","event","node-event-simulate"]},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core-dragdrop":{"requires":["base","node","io","dom","dd","event-key","event-focus","moodle-core-notification"]},"moodle-core-event":{"requires":["event-custom"]},"moodle-core-formchangechecker":{"requires":["base","event-focus","moodle-core-event"]},"moodle-core-handlebars":{"condition":{"trigger":"handlebars","when":"after"}},"moodle-core-languninstallconfirm":{"requires":["base","node","moodle-core-notification-confirm","moodle-core-notification-alert"]},"moodle-core-lockscroll":{"requires":["plugin","base-build"]},"moodle-core-maintenancemodetimer":{"requires":["base","node"]},"moodle-core-notification":{"requires":["moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core-notification-confirm","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core-notification-dialogue":{"requires":["base","node","panel","escape","event-key","dd-plugin","moodle-core-widget-focusafterclose","moodle-core-lockscroll"]},"moodle-core-notification-alert":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-confirm":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-exception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-ajaxexception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-popuphelp":{"requires":["moodle-core-tooltip"]},"moodle-core-tooltip":{"requires":["base","node","io-base","moodle-core-notification-dialogue","json-parse","widget-position","widget-position-align","event-outside","cache-base"]},"moodle-core_availability-form":{"requires":["base","node","event","event-delegate","panel","moodle-core-notification-dialogue","json"]},"moodle-backup-backupselectall":{"requires":["node","event","node-event-simulate","anim"]},"moodle-backup-confirmcancel":{"requires":["node","node-event-simulate","moodle-core-notification-confirm"]},"moodle-course-categoryexpander":{"requires":["node","event-key"]},"moodle-course-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-course-coursebase","moodle-course-util"]},"moodle-course-formatchooser":{"requires":["base","node","node-event-simulate"]},"moodle-course-management":{"requires":["base","node","io-base","moodle-core-notification-exception","json-parse","dd-constrain","dd-proxy","dd-drop","dd-delegate","node-event-delegate"]},"moodle-course-util":{"requires":["node"],"use":["moodle-course-util-base"],"submodules":{"moodle-course-util-base":{},"moodle-course-util-section":{"requires":["node","moodle-course-util-base"]},"moodle-course-util-cm":{"requires":["node","moodle-course-util-base"]}}},"moodle-form-dateselector":{"requires":["base","node","overlay","calendar"]},"moodle-form-passwordunmask":{"requires":[]},"moodle-form-shortforms":{"requires":["node","base","selector-css3","moodle-core-event"]},"moodle-question-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-question-preview":{"requires":["base","dom","event-delegate","event-key","core_question_engine"]},"moodle-question-searchform":{"requires":["base","node"]},"moodle-availability_completion-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_date-form":{"requires":["base","node","event","io","moodle-core_availability-form"]},"moodle-availability_grade-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_group-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_grouping-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_profile-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-mod_assign-history":{"requires":["node","transition"]},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-mod_quiz-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-base","moodle-mod_quiz-util-page","moodle-mod_quiz-util-slot","moodle-course-util"]},"moodle-mod_quiz-modform":{"requires":["base","node","event"]},"moodle-mod_quiz-questionchooser":{"requires":["moodle-core-chooserdialogue","moodle-mod_quiz-util","querystring-parse"]},"moodle-mod_quiz-quizbase":{"requires":["base","node"]},"moodle-mod_quiz-toolboxes":{"requires":["base","node","event","event-key","io","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-slot","moodle-core-notification-ajaxexception"]},"moodle-mod_quiz-util":{"requires":["node","moodle-core-actionmenu"],"use":["moodle-mod_quiz-util-base"],"submodules":{"moodle-mod_quiz-util-base":{},"moodle-mod_quiz-util-slot":{"requires":["node","moodle-mod_quiz-util-base"]},"moodle-mod_quiz-util-page":{"requires":["node","moodle-mod_quiz-util-base"]}}},"moodle-mod_scheduler-delselected":{"requires":["base","node","event"]},"moodle-mod_scheduler-studentlist":{"requires":["base","node","event","io"]},"moodle-mod_scheduler-saveseen":{"requires":["base","node","event"]},"moodle-message_airnotifier-toolboxes":{"requires":["base","node","io"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-event","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-filter_mathjaxloader-loader":{"requires":["moodle-core-event"]},"moodle-editor_atto-editor":{"requires":["node","transition","io","overlay","escape","event","event-simulate","event-custom","node-event-html5","node-event-simulate","yui-throttle","moodle-core-notification-dialogue","moodle-core-notification-confirm","moodle-editor_atto-rangy","handlebars","timers","querystring-stringify"]},"moodle-editor_atto-plugin":{"requires":["node","base","escape","event","event-outside","handlebars","event-custom","timers","moodle-editor_atto-menu"]},"moodle-editor_atto-menu":{"requires":["moodle-core-notification-dialogue","node","event","event-custom"]},"moodle-editor_atto-rangy":{"requires":[]},"moodle-report_eventlist-eventfilter":{"requires":["base","event","node","node-event-delegate","datatable","autocomplete","autocomplete-filters"]},"moodle-report_loglive-fetchlogs":{"requires":["base","event","node","io","node-event-delegate"]},"moodle-gradereport_grader-gradereporttable":{"requires":["base","node","event","handlebars","overlay","event-hover"]},"moodle-gradereport_history-userselector":{"requires":["escape","event-delegate","event-key","handlebars","io-base","json-parse","moodle-core-notification-dialogue"]},"moodle-tool_capability-search":{"requires":["base","node"]},"moodle-tool_lp-dragdrop-reorder":{"requires":["moodle-core-dragdrop"]},"moodle-tool_monitor-dropdown":{"requires":["base","event","node"]},"moodle-assignfeedback_editpdf-editor":{"requires":["base","event","node","io","graphics","json","event-move","event-resize","transition","querystring-stringify-simple","moodle-core-notification-dialog","moodle-core-notification-alert","moodle-core-notification-warning","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-atto_accessibilitychecker-button":{"requires":["color-base","moodle-editor_atto-plugin"]},"moodle-atto_accessibilityhelper-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_align-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bold-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_charmap-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_clear-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_collapse-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emojipicker-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emoticon-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_equation-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_h5p-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_html-beautify":{},"moodle-atto_html-button":{"requires":["promise","moodle-editor_atto-plugin","moodle-atto_html-beautify","moodle-atto_html-codemirror","event-valuechange"]},"moodle-atto_html-codemirror":{"requires":["moodle-atto_html-codemirror-skin"]},"moodle-atto_image-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_indent-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_italic-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_link-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-usedfiles":{"requires":["node","escape"]},"moodle-atto_media-button":{"requires":["moodle-editor_atto-plugin","moodle-form-shortforms"]},"moodle-atto_noautolink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_orderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_recordrtc-button":{"requires":["moodle-editor_atto-plugin","moodle-atto_recordrtc-recording"]},"moodle-atto_recordrtc-recording":{"requires":["moodle-atto_recordrtc-button"]},"moodle-atto_rtl-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_strike-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_subscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_superscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_table-button":{"requires":["moodle-editor_atto-plugin","moodle-editor_atto-menu","event","event-valuechange"]},"moodle-atto_title-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_underline-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_undo-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_unorderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-tinymce_mathslate-snippeteditor":{"requires":["json"]},"moodle-tinymce_mathslate-editor":{"requires":["dd-drag","dd-proxy","dd-drop","event","tabview","io-base","json","moodle-tinymce_mathslate-textool","moodle-tinymce_mathslate-mathjaxeditor"]},"moodle-tinymce_mathslate-dialogue":{"requires":["escape","moodle-local_mathslate-editor","moodle-tinymce_mathslate-editor"]},"moodle-tinymce_mathslate-textool":{"requires":["dd-drag","dd-proxy","dd-drop","event","json"]},"moodle-tinymce_mathslate-mathjaxeditor":{"requires":["moodle-tinymce_mathslate-snippeteditor","dd-drop"]}}},"gallery":{"name":"gallery","base":"https:\/\/sbselearning.strathmore.edu\/lib\/yuilib\/gallery\/","combine":true,"comboBase":"https:\/\/sbselearning.strathmore.edu\/theme\/yui_combo.php\/","ext":false,"root":"gallery\/1698178576\/","patterns":{"gallery-":{"group":"gallery"}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"https:\/\/sbselearning.strathmore.edu\/lib\/javascript.php\/1698178576\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker","moodle-core-notification-dialogue"]},"core_comment":{"name":"core_comment","fullpath":"https:\/\/sbselearning.strathmore.edu\/lib\/javascript.php\/1698178576\/comment\/comment.js","requires":["base","io-base","node","json","yui2-animation","overlay","escape"]},"mathjax":{"name":"mathjax","fullpath":"https:\/\/cdn.jsdelivr.net\/npm\/mathjax@2.7.8\/MathJax.js?delayStartupUntil=configured"}}};
M.yui.loader = {modules: {}};

//]]>
</script>
<meta name="description" content="Strathmore Graduate Studies provides its participants a world-class learning environment, where they can share and reflect on their experiences and develop new ideas that will lead their companies into a new era. SBS faculty combine high academic standards and industry standards with industry perspective. The research done and academic study is industry-based and therefore applicable to the same. SBS faculty is involved in producing local and regional business cases. A hallmark of SBS faculty is the commitment to serve the industry at the executive level, in an environment of responsibility and high ethos. Key focus is on the individual, nurturing one to be a business leader of high moral and professional integrity.">
<meta name="description" content="Strathmore Graduate Studies provides its participants a world-class learning environment, where they can share and reflect on their experiences and develop new ideas that will lead their companies into a new era. SBS faculty combine high academic standards and industry standards with industry perspective. The research done and academic study is industry-based and therefore applicable to the same. SBS faculty is involved in producing local and regional business cases. A hallmark of SBS faculty is the commitment to serve the industry at the executive level, in an environment of responsibility and high ethos. Key focus is on the individual, nurturing one to be a business leader of high moral and professional integrity.">
	<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="core/first" src="https://sbselearning.strathmore.edu/lib/requirejs.php/1698178576/core/first.js"></script><script type="text/x-mathjax-config;executed=true">
MathJax.Hub.Config({
    config: ["Accessible.js", "Safe.js"],
    errorSettings: { message: ["!"] },
    skipStartupTypeset: true,
    messageStyle: "none"
});
</script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jquery" src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/jquery/jquery-3.5.1.min.js"></script><script type="text/javascript">
require(['jquery'], function($) {
    require(['theme_boost/bootstrap/popover'], function() {
        var target = $("#calendar-day-popover-link-1-2024-59-0");
        target.popover({
            content: function() {
                var source = target.next().find("> *:not('.hidden')");
                var content = $('<div>');

                if (source.length) {
                    content.html(source.clone(false));
                } else {
                    content.html(target.data('alternate'));
                }

                return content.html();
            }
        });
    });
});
;

require([
    'jquery',
    'core_calendar/selectors',
    'core_calendar/events',
], function(
    $,
    CalendarSelectors,
    CalendarEvents
) {

    $('body').on(CalendarEvents.filterChanged, function(e, data) {
        M.util.js_pending("month-mini-0-filterChanged");
        // A filter value has been changed.
        // Find all matching cells in the popover data, and hide them.
        $("#month-mini-2024-2-0")
            .find(CalendarSelectors.popoverType[data.type])
            .toggleClass('hidden', !!data.hidden);
        M.util.js_complete("month-mini-0-filterChanged");
    });
});
</script><style type="text/css">.MathJax_Hover_Frame {border-radius: .25em; -webkit-border-radius: .25em; -moz-border-radius: .25em; -khtml-border-radius: .25em; box-shadow: 0px 0px 15px #83A; -webkit-box-shadow: 0px 0px 15px #83A; -moz-box-shadow: 0px 0px 15px #83A; -khtml-box-shadow: 0px 0px 15px #83A; border: 1px solid #A6D ! important; display: inline-block; position: absolute}
.MathJax_Menu_Button .MathJax_Hover_Arrow {position: absolute; cursor: pointer; display: inline-block; border: 2px solid #AAA; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px; font-family: 'Courier New',Courier; font-size: 9px; color: #F0F0F0}
.MathJax_Menu_Button .MathJax_Hover_Arrow span {display: block; background-color: #AAA; border: 1px solid; border-radius: 3px; line-height: 0; padding: 4px}
.MathJax_Hover_Arrow:hover {color: white!important; border: 2px solid #CCC!important}
.MathJax_Hover_Arrow:hover span {background-color: #CCC!important}
</style><style type="text/css">#MathJax_About {position: fixed; left: 50%; width: auto; text-align: center; border: 3px outset; padding: 1em 2em; background-color: #DDDDDD; color: black; cursor: default; font-family: message-box; font-size: 120%; font-style: normal; text-indent: 0; text-transform: none; line-height: normal; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; z-index: 201; border-radius: 15px; -webkit-border-radius: 15px; -moz-border-radius: 15px; -khtml-border-radius: 15px; box-shadow: 0px 10px 20px #808080; -webkit-box-shadow: 0px 10px 20px #808080; -moz-box-shadow: 0px 10px 20px #808080; -khtml-box-shadow: 0px 10px 20px #808080; filter: progid:DXImageTransform.Microsoft.dropshadow(OffX=2, OffY=2, Color='gray', Positive='true')}
#MathJax_About.MathJax_MousePost {outline: none}
.MathJax_Menu {position: absolute; background-color: white; color: black; width: auto; padding: 2px; border: 1px solid #CCCCCC; margin: 0; cursor: default; font: menu; text-align: left; text-indent: 0; text-transform: none; line-height: normal; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; z-index: 201; box-shadow: 0px 10px 20px #808080; -webkit-box-shadow: 0px 10px 20px #808080; -moz-box-shadow: 0px 10px 20px #808080; -khtml-box-shadow: 0px 10px 20px #808080; filter: progid:DXImageTransform.Microsoft.dropshadow(OffX=2, OffY=2, Color='gray', Positive='true')}
.MathJax_MenuItem {padding: 2px 2em; background: transparent}
.MathJax_MenuArrow {position: absolute; right: .5em; padding-top: .25em; color: #666666; font-size: .75em}
.MathJax_MenuActive .MathJax_MenuArrow {color: white}
.MathJax_MenuArrow.RTL {left: .5em; right: auto}
.MathJax_MenuCheck {position: absolute; left: .7em}
.MathJax_MenuCheck.RTL {right: .7em; left: auto}
.MathJax_MenuRadioCheck {position: absolute; left: 1em}
.MathJax_MenuRadioCheck.RTL {right: 1em; left: auto}
.MathJax_MenuLabel {padding: 2px 2em 4px 1.33em; font-style: italic}
.MathJax_MenuRule {border-top: 1px solid #CCCCCC; margin: 4px 1px 0px}
.MathJax_MenuDisabled {color: GrayText}
.MathJax_MenuActive {background-color: Highlight; color: HighlightText}
.MathJax_MenuDisabled:focus, .MathJax_MenuLabel:focus {background-color: #E8E8E8}
.MathJax_ContextMenu:focus {outline: none}
.MathJax_ContextMenu .MathJax_MenuItem:focus {outline: none}
#MathJax_AboutClose {top: .2em; right: .2em}
.MathJax_Menu .MathJax_MenuClose {top: -10px; left: -10px}
.MathJax_MenuClose {position: absolute; cursor: pointer; display: inline-block; border: 2px solid #AAA; border-radius: 18px; -webkit-border-radius: 18px; -moz-border-radius: 18px; -khtml-border-radius: 18px; font-family: 'Courier New',Courier; font-size: 24px; color: #F0F0F0}
.MathJax_MenuClose span {display: block; background-color: #AAA; border: 1.5px solid; border-radius: 18px; -webkit-border-radius: 18px; -moz-border-radius: 18px; -khtml-border-radius: 18px; line-height: 0; padding: 8px 0 6px}
.MathJax_MenuClose:hover {color: white!important; border: 2px solid #CCC!important}
.MathJax_MenuClose:hover span {background-color: #CCC!important}
.MathJax_MenuClose:hover:focus {outline: none}
</style><style type="text/css">.MathJax_Preview .MJXf-math {color: inherit!important}
</style><style type="text/css">.MJX_Assistive_MathML {position: absolute!important; top: 0; left: 0; clip: rect(1px, 1px, 1px, 1px); padding: 1px 0 0 0!important; border: 0!important; height: 1px!important; width: 1px!important; overflow: hidden!important; display: block!important; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none}
.MJX_Assistive_MathML.MJX_Assistive_MathML_Block {width: 100%!important}
</style><style type="text/css">#MathJax_Zoom {position: absolute; background-color: #F0F0F0; overflow: auto; display: block; z-index: 301; padding: .5em; border: 1px solid black; margin: 0; font-weight: normal; font-style: normal; text-align: left; text-indent: 0; text-transform: none; line-height: normal; letter-spacing: normal; word-spacing: normal; word-wrap: normal; white-space: nowrap; float: none; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; box-shadow: 5px 5px 15px #AAAAAA; -webkit-box-shadow: 5px 5px 15px #AAAAAA; -moz-box-shadow: 5px 5px 15px #AAAAAA; -khtml-box-shadow: 5px 5px 15px #AAAAAA; filter: progid:DXImageTransform.Microsoft.dropshadow(OffX=2, OffY=2, Color='gray', Positive='true')}
#MathJax_ZoomOverlay {position: absolute; left: 0; top: 0; z-index: 300; display: inline-block; width: 100%; height: 100%; border: 0; padding: 0; margin: 0; background-color: white; opacity: 0; filter: alpha(opacity=0)}
#MathJax_ZoomFrame {position: relative; display: inline-block; height: 0; width: 0}
#MathJax_ZoomEventTrap {position: absolute; left: 0; top: 0; z-index: 302; display: inline-block; border: 0; padding: 0; margin: 0; background-color: white; opacity: 0; filter: alpha(opacity=0)}
</style><style type="text/css">.MathJax_Preview {color: #888; display: contents}
#MathJax_Message {position: fixed; left: 1em; bottom: 1.5em; background-color: #E6E6E6; border: 1px solid #959595; margin: 0px; padding: 2px 8px; z-index: 102; color: black; font-size: 80%; width: auto; white-space: nowrap}
#MathJax_MSIE_Frame {position: absolute; top: 0; left: 0; width: 0px; z-index: 101; border: 0px; margin: 0px; padding: 0px}
.MathJax_Error {color: #CC0000; font-style: italic}
</style><style type="text/css">.MJXp-script {font-size: .8em}
.MJXp-right {-webkit-transform-origin: right; -moz-transform-origin: right; -ms-transform-origin: right; -o-transform-origin: right; transform-origin: right}
.MJXp-bold {font-weight: bold}
.MJXp-italic {font-style: italic}
.MJXp-scr {font-family: MathJax_Script,'Times New Roman',Times,STIXGeneral,serif}
.MJXp-frak {font-family: MathJax_Fraktur,'Times New Roman',Times,STIXGeneral,serif}
.MJXp-sf {font-family: MathJax_SansSerif,'Times New Roman',Times,STIXGeneral,serif}
.MJXp-cal {font-family: MathJax_Caligraphic,'Times New Roman',Times,STIXGeneral,serif}
.MJXp-mono {font-family: MathJax_Typewriter,'Times New Roman',Times,STIXGeneral,serif}
.MJXp-largeop {font-size: 150%}
.MJXp-largeop.MJXp-int {vertical-align: -.2em}
.MJXp-math {display: inline-block; line-height: 1.2; text-indent: 0; font-family: 'Times New Roman',Times,STIXGeneral,serif; white-space: nowrap; border-collapse: collapse}
.MJXp-display {display: block; text-align: center; margin: 1em 0}
.MJXp-math span {display: inline-block}
.MJXp-box {display: block!important; text-align: center}
.MJXp-box:after {content: " "}
.MJXp-rule {display: block!important; margin-top: .1em}
.MJXp-char {display: block!important}
.MJXp-mo {margin: 0 .15em}
.MJXp-mfrac {margin: 0 .125em; vertical-align: .25em}
.MJXp-denom {display: inline-table!important; width: 100%}
.MJXp-denom > * {display: table-row!important}
.MJXp-surd {vertical-align: top}
.MJXp-surd > * {display: block!important}
.MJXp-script-box > *  {display: table!important; height: 50%}
.MJXp-script-box > * > * {display: table-cell!important; vertical-align: top}
.MJXp-script-box > *:last-child > * {vertical-align: bottom}
.MJXp-script-box > * > * > * {display: block!important}
.MJXp-mphantom {visibility: hidden}
.MJXp-munderover, .MJXp-munder {display: inline-table!important}
.MJXp-over {display: inline-block!important; text-align: center}
.MJXp-over > * {display: block!important}
.MJXp-munderover > *, .MJXp-munder > * {display: table-row!important}
.MJXp-mtable {vertical-align: .25em; margin: 0 .125em}
.MJXp-mtable > * {display: inline-table!important; vertical-align: middle}
.MJXp-mtr {display: table-row!important}
.MJXp-mtd {display: table-cell!important; text-align: center; padding: .5em 0 0 .5em}
.MJXp-mtr > .MJXp-mtd:first-child {padding-left: 0}
.MJXp-mtr:first-child > .MJXp-mtd {padding-top: 0}
.MJXp-mlabeledtr {display: table-row!important}
.MJXp-mlabeledtr > .MJXp-mtd:first-child {padding-left: 0}
.MJXp-mlabeledtr:first-child > .MJXp-mtd {padding-top: 0}
.MJXp-merror {background-color: #FFFF88; color: #CC0000; border: 1px solid #CC0000; padding: 1px 3px; font-style: normal; font-size: 90%}
.MJXp-scale0 {-webkit-transform: scaleX(.0); -moz-transform: scaleX(.0); -ms-transform: scaleX(.0); -o-transform: scaleX(.0); transform: scaleX(.0)}
.MJXp-scale1 {-webkit-transform: scaleX(.1); -moz-transform: scaleX(.1); -ms-transform: scaleX(.1); -o-transform: scaleX(.1); transform: scaleX(.1)}
.MJXp-scale2 {-webkit-transform: scaleX(.2); -moz-transform: scaleX(.2); -ms-transform: scaleX(.2); -o-transform: scaleX(.2); transform: scaleX(.2)}
.MJXp-scale3 {-webkit-transform: scaleX(.3); -moz-transform: scaleX(.3); -ms-transform: scaleX(.3); -o-transform: scaleX(.3); transform: scaleX(.3)}
.MJXp-scale4 {-webkit-transform: scaleX(.4); -moz-transform: scaleX(.4); -ms-transform: scaleX(.4); -o-transform: scaleX(.4); transform: scaleX(.4)}
.MJXp-scale5 {-webkit-transform: scaleX(.5); -moz-transform: scaleX(.5); -ms-transform: scaleX(.5); -o-transform: scaleX(.5); transform: scaleX(.5)}
.MJXp-scale6 {-webkit-transform: scaleX(.6); -moz-transform: scaleX(.6); -ms-transform: scaleX(.6); -o-transform: scaleX(.6); transform: scaleX(.6)}
.MJXp-scale7 {-webkit-transform: scaleX(.7); -moz-transform: scaleX(.7); -ms-transform: scaleX(.7); -o-transform: scaleX(.7); transform: scaleX(.7)}
.MJXp-scale8 {-webkit-transform: scaleX(.8); -moz-transform: scaleX(.8); -ms-transform: scaleX(.8); -o-transform: scaleX(.8); transform: scaleX(.8)}
.MJXp-scale9 {-webkit-transform: scaleX(.9); -moz-transform: scaleX(.9); -ms-transform: scaleX(.9); -o-transform: scaleX(.9); transform: scaleX(.9)}
.MathJax_PHTML .noError {vertical-align: ; font-size: 90%; text-align: left; color: black; padding: 1px 3px; border: 1px solid}
</style></head>
<body id="page-site-index" class="format-site course path-site chrome dir-ltr lang-en yui-skin-sam yui3-skin-sam sbselearning-strathmore-edu pagelayout-frontpage course-1 context-2 theme-lfw noediting builderpage default-login isguestuser coursegrid0 navanim1 sticky-nav1 coursetheme- theme-hidden-region-mode pre-bgstrip1 sidebar-case sidebar-one custom_id_a59e006be59d custom_id_5e37f615d176 custom_id_5b1649004a21 editing-fw jsenabled page-loaded"><div id="MathJax_Message" style="display: none;"></div>
<div>
    <a class="sr-only sr-only-focusable" href="#maincontent">Skip to main content</a>
</div><script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/babel-polyfill/polyfill.min.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/polyfills/polyfill.js"></script>
<script src="https://sbselearning.strathmore.edu/theme/yui_combo.php/rollup/3.17.2/yui-moodlesimple-min.js"></script><div id="yui3-css-stamp" style="position: absolute !important; visibility: hidden !important" class=""></div><script src="https://sbselearning.strathmore.edu/theme/jquery.php/core/jquery-3.5.1.min.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/javascript-static.js"></script>
<script>
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>

<div id="page-outer">
<div id="page">
<div id="page-a">
    <div id="main-header">
						<div class="header-innner">
		<div class="header-inner2">
						<div id="master-header">
			<div class="master-header-inner">
	        	<div class="container-fluid">
	            	<div class="row">
	                	<div class="col-md-12">
						<div class="flexcols">
		                    <div class="logo-wrap">
	<div class="main-logo">
		<a href="https://sgs.strathmore.edu/" title="Strathmore University Graduate Studies">
			<img class="logo-light" src="https://sgs.strathmore.edu/uploads/logo/School-of-Graduate-Studies-logo.png" alt="Strathmore University Graduate Studies">
			<img class="logo-dark" src="https://sgs.strathmore.edu/uploads/logo/School-of-Graduate-Studies-logo.png" alt="Strathmore University Graduate Studies">
		</a>
	</div>
</div>
																														<div class="menu-toggle"><span class="show-menu"><i class="fa fa-bars"></i></span></div>
																	<div>
																					<div class="header-tools type-icon tools-pos1"><div class="theme-plugins"></div><span class="header-tools-link tool-search" title="Search" data-toggle="modal" data-target="#header-modal-search"><i class="icon1 fa fa-search"></i></span><span class="header-tools-link tool-login" title="Log in" data-toggle="modal" data-target="#header-modal-login"><i class="icon1 fa fa-lock"></i></span></div>																													</div>
																																			</div>
	                </div>
	            </div>
			</div>
	        </div>
			</div>
			<div class="mobile-menu">
				<ul class="main-menu theme-ddmenu" data-animtype="1" data-animspeed="300"><li class="home-item"><a href="https://sbselearning.strathmore.edu/" title="Strathmore University Business School"><i class="fa fa-home"></i></a></li><li class="dropdown"><a href="#" class="" data-toggle="" title="Strathmore Community">Strathmore<span class="mobile-arrow"></span></a><ul class="dropdown-list"><li class=""><a title="Strathmore Graduate Studies Website" class="" href="http://sbs.strathmore.edu">Strathmore Graduate Studies</a></li><li class=""><a title="Strathmore University Website" class="" href="http://strathmore.edu">Strathmore University</a></li></ul></li><li class="dropdown"><a href="#" class="" data-toggle="" title="University Library">University Library<span class="mobile-arrow"></span></a><ul class="dropdown-list"><li class=""><a title="University Library Catalogue" class="" href="http://www.library.strathmore.edu/">Library Catalogue</a></li><li class=""><a title="University Off Campus Portal" class="" href="http://ezproxy.library.strathmore.edu/">Off-Campus Access(eResources)</a></li><li class=""><a title="Online Repository Resources" class="" href="https://su-plus.strathmore.edu/handle/11071/1428">Research at Strathmore Graduate Studies</a></li><li class=""><a title="Past Exam Papers" class="" href="https://su-plus.strathmore.edu/handle/11071/3872">Exams Bank</a></li></ul></li><li class=""><a title="Coaching Management System" class="" href="http://my.sbs.ac.ke/coaching">Coaching System</a></li><li class="dropdown"><a href="#" class="" data-toggle="" title="AMS">AMS<span class="mobile-arrow"></span></a><ul class="dropdown-list"><li class=""><a class="" href="https://su-sso.strathmore.edu/cas-prd/login?service=https%3A%2F%2Fsu-sso.strathmore.edu%2Fsusams%2Fservlet%2Fedu%2Fstrathmore%2Fams%2Fsusams%2FInit.html">Login</a></li><li class=""><a class="" href="https://su-sso.strathmore.edu/student-pss">Student password Reset</a></li></ul></li></ul>									<div class="extra-content">
						<div class="menu-searchform"><div class="form-inner"><form id="menu-search" action="sgs.strathmore.edu/course/search.php"><input id="menu-searchbox" type="text" value="" placeholder="Search" name="search"><button type="submit"><i class="fa fa-search"></i></button></form></div></div>																							</div>
							</div>
							<div class="sticky-replace-el" style="height: 0px;"></div>
					    		        <div id="main-navigation" class="navigation-bar">
		            <div class="main-navigation-inner">
		                <div class="container-fluid">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <ul class="main-menu theme-ddmenu sf-js-enabled" data-animtype="1" data-animspeed="300" style="touch-action: pan-y;"><li class="home-item"><a href="https://sbselearning.strathmore.edu/" title="Strathmore University Business School"><i class="fa fa-home"></i></a></li><li class="dropdown"><a href="#" class="sf-with-ul" data-toggle="" title="Strathmore Community">Strathmore<span class="mobile-arrow"></span></a><ul class="dropdown-list" style="display: none;"><li class=""><a title="Strathmore Graduate Studies Website" class="" href="http://sbs.strathmore.edu">Strathmore Graduate Studies</a></li><li class=""><a title="Strathmore University Website" class="" href="http://strathmore.edu">Strathmore University</a></li></ul></li><li class="dropdown"><a href="#" class="sf-with-ul" data-toggle="" title="University Library">University Library<span class="mobile-arrow"></span></a><ul class="dropdown-list" style="display: none;"><li class=""><a title="University Library Catalogue" class="" href="http://www.library.strathmore.edu/">Library Catalogue</a></li><li class=""><a title="University Off Campus Portal" class="" href="http://ezproxy.library.strathmore.edu/">Off-Campus Access(eResources)</a></li><li class=""><a title="Online Repository Resources" class="" href="https://su-plus.strathmore.edu/handle/11071/1428">Research at Strathmore Graduate Studies</a></li><li class=""><a title="Past Exam Papers" class="" href="https://su-plus.strathmore.edu/handle/11071/3872">Exams Bank</a></li></ul></li><li class=""><a title="Coaching Management System" class="" href="http://my.sbs.ac.ke/coaching">Coaching System</a></li><li class="dropdown"><a href="#" class="sf-with-ul" data-toggle="" title="AMS">AMS<span class="mobile-arrow"></span></a><ul class="dropdown-list" style="display: none;"><li class=""><a class="" href="https://su-sso.strathmore.edu/cas-prd/login?service=https%3A%2F%2Fsu-sso.strathmore.edu%2Fsusams%2Fservlet%2Fedu%2Fstrathmore%2Fams%2Fsusams%2FInit.html">Login</a></li><li class=""><a class="" href="https://su-sso.strathmore.edu/student-pss">Student password Reset</a></li></ul></li></ul>		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    
		</div>
	</div>
	</div>
<div id="page-header" class="isbg">
			<div class="page-header-img" style="background-image:url('//sbselearning.strathmore.edu/pluginfile.php/1/theme_mb2nl/headerimg/1698178576/DSC_0479-002-Strathmore-BS.jpg');"></div>
		<div class="inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="page-heading flexcols">
						<div class="page-header-left">
							<h1 class="heding h2 nocourse">
																	Strathmore Graduate Studies															</h1>
						</div>
						<div class="page-header-right">
																																						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="page-b">
<div id="main-slider" class="mb2slides mb2slides-mainslider mb2slides65e05239c07c2 navdir1 loaded mb2slides-mobile"><div class="mb2slides-inner"><div class="lSSlideOuter "><div class="lSSlideWrapper usingCss" style="transition-duration: 800ms; transition-timing-function: ease;"><ul class="mb2slides-slide-list lightSlider lsGrab lSSlide" data-mode="slide" data-auto="1" data-aspeed="800" data-apause="7000" data-loop="1" data-pager="0" data-control="1" data-items="1" data-moveitems="1" data-margin="" data-aheight="1" data-kpress="1" data-modid="65e05239c07c2" data-slidescount="2" style="width: 3212px; transform: translate3d(-1927.2px, 0px, 0px); height: 250px; padding-bottom: 0%;"><li class="mb2slides-slide-item caption-custom clone left" style="width: 642.4px;"><div class="mb2slides-slide-item-inner"><div class="mb2slides-slide-media" style="background-image:url('https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/4/My%20project%20%281%29.jpg');"><img class="mb2slides-slide-img" src="https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/4/My%20project%20%281%29.jpg" alt=""></div><div class="mb2slides-caption hor-left ver-center anim1 istitle" style="top: 15px; bottom: -15px; opacity: 0;"><div class="mb2slides-caption1" style="margin:0 auto;"><div class="mb2slides-caption2"><div class="mb2slides-caption3"><div class="mb2slides-caption-content custom" style="max-width:560px;background-color:rgba(9, 8, 8, 0.52);"><div class="mb2slides-caption-content2"><div class="mb2slides-caption-content3"><h4 class="mb2slides-title" style="font-size:2.4rem;">Executive Education</h4></div></div></div></div></div></div></div></div></li><li class="mb2slides-slide-item caption-custom lslide" style="width: 642.4px;"><div class="mb2slides-slide-item-inner"><div class="mb2slides-slide-media" style="background-image:url('https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/2/DSC_0318.jpg');"><img class="mb2slides-slide-img" src="https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/2/DSC_0318.jpg" alt=""></div><div class="mb2slides-caption hor-left ver-center anim1 istitle" style="top: 15px; bottom: -15px; opacity: 0;"><div class="mb2slides-caption1" style="margin:0 auto;"><div class="mb2slides-caption2"><div class="mb2slides-caption3"><div class="mb2slides-caption-content custom" style="max-width:560px;background-color:rgba(62, 60, 60, 0.54);"><div class="mb2slides-caption-content2"><div class="mb2slides-caption-content3"><h4 class="mb2slides-title" style="font-size:2.4rem;">Post Graduate Courses </h4></div></div></div></div></div></div></div></div></li><li class="mb2slides-slide-item caption-custom lslide" style="width: 642.4px;"><div class="mb2slides-slide-item-inner"><div class="mb2slides-slide-media" style="background-image:url('https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/3/DSC_1658%20bw.jpg');"><img class="mb2slides-slide-img" src="https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/3/DSC_1658%20bw.jpg" alt=""></div><div class="mb2slides-caption hor-left ver-center anim1 istitle" style="top: 15px; bottom: -15px; opacity: 0;"><div class="mb2slides-caption1" style="margin:0 auto;"><div class="mb2slides-caption2"><div class="mb2slides-caption3"><div class="mb2slides-caption-content custom" style="max-width:560px;background-color:rgba(9, 9, 9, 0.52);"><div class="mb2slides-caption-content2"><div class="mb2slides-caption-content3"><h4 class="mb2slides-title" style="font-size:2.4rem;">Undergraduate Courses</h4></div></div></div></div></div></div></div></div></li><li class="mb2slides-slide-item caption-custom lslide active" style="width: 642.4px;"><div class="mb2slides-slide-item-inner"><div class="mb2slides-slide-media" style="background-image:url('https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/4/My%20project%20%281%29.jpg');"><img class="mb2slides-slide-img" src="https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/4/My%20project%20%281%29.jpg" alt=""></div><div class="mb2slides-caption hor-left ver-center anim1 istitle" style="top: 0px; bottom: 0px; opacity: 1;"><div class="mb2slides-caption1" style="margin:0 auto;"><div class="mb2slides-caption2"><div class="mb2slides-caption3"><div class="mb2slides-caption-content custom" style="max-width:560px;background-color:rgba(9, 8, 8, 0.52);"><div class="mb2slides-caption-content2"><div class="mb2slides-caption-content3"><h4 class="mb2slides-title" style="font-size:2.4rem;">Executive Education</h4></div></div></div></div></div></div></div></div></li><li class="mb2slides-slide-item caption-custom clone right" style="width: 642.4px;"><div class="mb2slides-slide-item-inner"><div class="mb2slides-slide-media" style="background-image:url('https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/2/DSC_0318.jpg');"><img class="mb2slides-slide-img" src="https://sbselearning.strathmore.edu/pluginfile.php/1/local_mb2slides/attachment/2/DSC_0318.jpg" alt=""></div><div class="mb2slides-caption hor-left ver-center anim1 istitle" style="top: 15px; bottom: -15px; opacity: 0;"><div class="mb2slides-caption1" style="margin:0 auto;"><div class="mb2slides-caption2"><div class="mb2slides-caption3"><div class="mb2slides-caption-content custom" style="max-width:560px;background-color:rgba(62, 60, 60, 0.54);"><div class="mb2slides-caption-content2"><div class="mb2slides-caption-content3"><h4 class="mb2slides-title" style="font-size:2.4rem;">Post Graduate Courses </h4></div></div></div></div></div></div></div></div></li></ul></div><div class="lSAction"><a class="lSPrev"><span class="fa fa-angle-left"></span></a><a class="lSNext"><span class="fa fa-angle-right"></span></a></div></div></div></div><div id="main-content">
    <div class="container-fluid">
        <div class="row">
            <section id="region-main" class="content-col col-md-9">
                <div id="page-content">
										                	<span class="notifications" id="user-notifications"></span>					                	<div role="main"><span id="maincontent"></span><a class="skip-block skip aabtn" href="#skipcategories">Skip course categories</a><div id="frontpage-category-names"><h2>Course categories</h2><div class="course_category_tree clearfix frontpage-category-names"><div class="collapsible-actions"><a class="collapseexpand aabtn" href="#">Expand all</a></div><div class="content"><div class="subcategories"><div class="category notloaded with_children collapsed" data-categoryid="344" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=344">Institute of Healthcare Management (IHM)</a><span title="Number of courses" class="numberofcourse"> (42)</span></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="231" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=231">Pre-Doctoral Workshop</a></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="21" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=21">Executive Education</a></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="69" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=69">PFD</a></h3></div><div class="content"></div></div><div class="category notloaded" data-categoryid="438" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=438">Hospital Management for Health Professionals</a><span title="Number of courses" class="numberofcourse"> (1)</span></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="569" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=569">SBS - Thesis &amp; Proposal Plagiarism Check (2021+)</a><span title="Number of courses" class="numberofcourse"> (2)</span></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="680" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=680">SBS Undergraduate Programs</a><span title="Number of courses" class="numberofcourse"> (15)</span></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="738" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=738">SBS Graduate Programs</a></h3></div><div class="content"></div></div><div class="category notloaded" data-categoryid="958" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=958">eLearning Tutorials</a><span title="Number of courses" class="numberofcourse"> (4)</span></h3></div><div class="content"></div></div><div class="category notloaded" data-categoryid="994" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=994">SBS Uganda</a><span title="Number of courses" class="numberofcourse"> (1)</span></h3></div><div class="content"></div></div><div class="category notloaded" data-categoryid="1184" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=1184">Sample Course</a><span title="Number of courses" class="numberofcourse"> (2)</span></h3></div><div class="content"></div></div><div class="category notloaded with_children collapsed" data-categoryid="1360" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://sbselearning.strathmore.edu/course/index.php?categoryid=1360">SBS Doctoral Programmes</a></h3></div><div class="content"></div></div></div></div></div></div><span class="skip-block-to" id="skipcategories"></span><br></div>                                                        	                </div>
            </section>
     		            	<section class="sidebar-col col-md-3">
                	<aside id="block-region-side-pre" class="side-pre style-default block-region" data-blockregion="side-pre" data-droptarget="1"><a href="#sb-1" class="sr-only sr-only-focusable">Skip Login</a>

<section id="inst1689" class=" block_login block  card mb-3" role="complementary" data-block="login" aria-labelledby="instance-1689-header">

    <div class="card-body p-3">

            <h5 id="instance-1689-header" class="card-title d-inline">Login</h5>


        <div class="card-text content mt-3">
            
<form class="loginform" id="login" method="post" action="https://sbselearning.strathmore.edu/login/index.php"><div class="form-group"><label for="login_username">Username</label><input type="text" name="username" id="login_username" class="form-control" value="" autocomplete="username"></div><div class="form-group"><label for="login_password">Password</label><input type="password" name="password" id="login_password" class="form-control" value="" autocomplete="current-password"></div><div class="form-check"><label class="form-check-label"><input type="checkbox" name="rememberusername" id="rememberusername" class="form-check-input" value="1"> Remember username</label></div><div class="form-group"><input type="submit" class="btn btn-primary btn-block" value="Log in"></div><input type="hidden" name="logintoken" value="BtcjnpRYPpCDFlGxIEmX6DQ71D3Zgsy6"></form>
<div><a href="https://sbselearning.strathmore.edu/login/forgot_password.php">Lost password?</a></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-1"></span><a href="#sb-2" class="sr-only sr-only-focusable">Skip Navigation</a>

<section id="inst1586" class=" block_navigation block  card mb-3" role="navigation" data-block="navigation" aria-labelledby="instance-1586-header">

    <div class="card-body p-3">

            <h5 id="instance-1586-header" class="card-title d-inline">Navigation</h5>


        <div class="card-text content mt-3">
            <ul class="block_tree list" role="tree" data-ajax-loader="block_navigation/nav_loader"><li class="type_unknown depth_1 contains_branch current_branch" aria-labelledby="label_1_1" tabindex="-1"><p class="tree_item branch active_tree_node canexpand navigation_node" role="treeitem" aria-expanded="true" aria-owns="random65e05239b95c41_group" data-collapsible="false" tabindex="0" aria-selected="true"><a tabindex="-1" id="label_1_1" href="https://sbselearning.strathmore.edu/">Home</a></p><ul id="random65e05239b95c41_group" role="group" tabindex="-1"><li class="type_course depth_2 contains_branch" aria-labelledby="label_2_2" tabindex="-1"><p class="tree_item branch" role="treeitem" aria-expanded="false" aria-owns="random65e05239b95c42_group" tabindex="-1" aria-selected="false"><span tabindex="-1" id="label_2_2" title="Strathmore University Business School">Site pages</span></p><ul id="random65e05239b95c42_group" role="group" aria-hidden="true" tabindex="-1"><li class="type_setting depth_3 item_with_icon" aria-labelledby="label_3_4" tabindex="-1"><p class="tree_item hasicon" role="treeitem" tabindex="-1" aria-selected="false"><a tabindex="-1" id="label_3_4" href="https://sbselearning.strathmore.edu/tag/search.php"><i class="icon fa fa-fw fa-fw navicon" aria-hidden="true" tabindex="-1"></i><span class="item-content-wrap" tabindex="-1">Tags</span></a></p></li><li class="type_custom depth_3 item_with_icon" aria-labelledby="label_3_5" tabindex="-1"><p class="tree_item hasicon" role="treeitem" tabindex="-1" aria-selected="false"><a tabindex="-1" id="label_3_5" href="https://sbselearning.strathmore.edu/calendar/view.php?view=month"><i class="icon fa fa-calendar fa-fw navicon" aria-hidden="true" tabindex="-1"></i><span class="item-content-wrap" tabindex="-1">Calendar</span></a></p></li><li class="type_activity depth_3 item_with_icon" aria-labelledby="label_3_6" tabindex="-1"><p class="tree_item hasicon" role="treeitem" tabindex="-1" aria-selected="false"><a tabindex="-1" id="label_3_6" title="Forum" href="https://sbselearning.strathmore.edu/mod/forum/view.php?id=529"><img class="icon navicon" alt="Forum" title="Forum" src="https://sbselearning.strathmore.edu/theme/image.php/mb2nl/forum/1698178576/icon" tabindex="-1"><span class="item-content-wrap" tabindex="-1">Site news</span></a></p></li></ul></li><li class="type_system depth_2 contains_branch" aria-labelledby="label_2_7" tabindex="-1"><p class="tree_item branch" role="treeitem" id="expandable_branch_0_courses" aria-expanded="false" data-requires-ajax="true" data-loaded="false" data-node-id="expandable_branch_0_courses" data-node-key="courses" data-node-type="0" tabindex="-1" aria-selected="false"><a tabindex="-1" id="label_2_7" href="https://sbselearning.strathmore.edu/course/index.php">Courses</a></p></li></ul></li></ul>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-2"></span><a href="#sb-3" class="sr-only sr-only-focusable">Skip Calendar</a>

<section id="inst1702" class=" block_calendar_month block  card mb-3" role="complementary" data-block="calendar_month" aria-labelledby="instance-1702-header">

    <div class="card-body p-3">

            <h5 id="instance-1702-header" class="card-title d-inline">Calendar</h5>


        <div class="card-text content mt-3">
            <div id="calendar-month-2024-2-65e05239bcd5665e05239b95c46" data-template="core_calendar/month_mini" data-includenavigation="true" data-mini="true">
    <div id="month-mini-2024-2-0" class="calendarwrapper" data-courseid="1" data-categoryid="0" data-month="2" data-year="2024" data-day="29" data-view="month">


    <span class="overlay-icon-container hidden" data-region="overlay-icon-container">


        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw " title="Loading" aria-label="Loading"></i></span>
    </span>
    <table class="minicalendar calendartable">
        <caption class="calendar-controls">
                <a href="#" class="arrow_link previous" title="Previous month" data-year="2024" data-month="1">
                    <span class="arrow">◄</span>
                </a>
                <span class="hide"> | </span>
                <span class="current">
                    <a href="https://sbselearning.strathmore.edu/calendar/view.php?view=month&amp;time=1709154000" title="This month">February 2024</a>
                </span>
                <span class="hide"> | </span>
                <a href="#" class="arrow_link next" title="Next month" data-year="2024" data-month="3">
                    <span class="arrow">►</span>
                </a>
        </caption>
        <thead>
          <tr>
                <th class="header text-xs-center">
                    <span class="sr-only">Sunday</span>
                    <span aria-hidden="true">Sun</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Monday</span>
                    <span aria-hidden="true">Mon</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Tuesday</span>
                    <span aria-hidden="true">Tue</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Wednesday</span>
                    <span aria-hidden="true">Wed</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Thursday</span>
                    <span aria-hidden="true">Thu</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Friday</span>
                    <span aria-hidden="true">Fri</span>
                </th>
                <th class="header text-xs-center">
                    <span class="sr-only">Saturday</span>
                    <span aria-hidden="true">Sat</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr data-region="month-view-week">
                    <td class="dayblank">&nbsp;</td>
                    <td class="dayblank">&nbsp;</td>
                    <td class="dayblank">&nbsp;</td>
                    <td class="dayblank">&nbsp;</td>
                    <td class="day text-center" data-day-timestamp="1706734800"><span class="sr-only">No events, Thursday, 1 February</span>
                            <span aria-hidden="true">1</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1706821200"><span class="sr-only">No events, Friday, 2 February</span>
                            <span aria-hidden="true">2</span>
                        </td>
                    <td class="day text-center weekend" data-day-timestamp="1706907600"><span class="sr-only">No events, Saturday, 3 February</span>
                            <span aria-hidden="true">3</span>
                        </td>
            </tr>
            <tr data-region="month-view-week">
                    <td class="day text-center weekend" data-day-timestamp="1706994000"><span class="sr-only">No events, Sunday, 4 February</span>
                            <span aria-hidden="true">4</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707080400"><span class="sr-only">No events, Monday, 5 February</span>
                            <span aria-hidden="true">5</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707166800"><span class="sr-only">No events, Tuesday, 6 February</span>
                            <span aria-hidden="true">6</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707253200"><span class="sr-only">No events, Wednesday, 7 February</span>
                            <span aria-hidden="true">7</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707339600"><span class="sr-only">No events, Thursday, 8 February</span>
                            <span aria-hidden="true">8</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707426000"><span class="sr-only">No events, Friday, 9 February</span>
                            <span aria-hidden="true">9</span>
                        </td>
                    <td class="day text-center weekend" data-day-timestamp="1707512400"><span class="sr-only">No events, Saturday, 10 February</span>
                            <span aria-hidden="true">10</span>
                        </td>
            </tr>
            <tr data-region="month-view-week">
                    <td class="day text-center weekend" data-day-timestamp="1707598800"><span class="sr-only">No events, Sunday, 11 February</span>
                            <span aria-hidden="true">11</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707685200"><span class="sr-only">No events, Monday, 12 February</span>
                            <span aria-hidden="true">12</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707771600"><span class="sr-only">No events, Tuesday, 13 February</span>
                            <span aria-hidden="true">13</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707858000"><span class="sr-only">No events, Wednesday, 14 February</span>
                            <span aria-hidden="true">14</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1707944400"><span class="sr-only">No events, Thursday, 15 February</span>
                            <span aria-hidden="true">15</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708030800"><span class="sr-only">No events, Friday, 16 February</span>
                            <span aria-hidden="true">16</span>
                        </td>
                    <td class="day text-center weekend" data-day-timestamp="1708117200"><span class="sr-only">No events, Saturday, 17 February</span>
                            <span aria-hidden="true">17</span>
                        </td>
            </tr>
            <tr data-region="month-view-week">
                    <td class="day text-center weekend" data-day-timestamp="1708203600"><span class="sr-only">No events, Sunday, 18 February</span>
                            <span aria-hidden="true">18</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708290000"><span class="sr-only">No events, Monday, 19 February</span>
                            <span aria-hidden="true">19</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708376400"><span class="sr-only">No events, Tuesday, 20 February</span>
                            <span aria-hidden="true">20</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708462800"><span class="sr-only">No events, Wednesday, 21 February</span>
                            <span aria-hidden="true">21</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708549200"><span class="sr-only">No events, Thursday, 22 February</span>
                            <span aria-hidden="true">22</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708635600"><span class="sr-only">No events, Friday, 23 February</span>
                            <span aria-hidden="true">23</span>
                        </td>
                    <td class="day text-center weekend" data-day-timestamp="1708722000"><span class="sr-only">No events, Saturday, 24 February</span>
                            <span aria-hidden="true">24</span>
                        </td>
            </tr>
            <tr data-region="month-view-week">
                    <td class="day text-center weekend" data-day-timestamp="1708808400"><span class="sr-only">No events, Sunday, 25 February</span>
                            <span aria-hidden="true">25</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708894800"><span class="sr-only">No events, Monday, 26 February</span>
                            <span aria-hidden="true">26</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1708981200"><span class="sr-only">No events, Tuesday, 27 February</span>
                            <span aria-hidden="true">27</span>
                        </td>
                    <td class="day text-center" data-day-timestamp="1709067600"><span class="sr-only">No events, Wednesday, 28 February</span>
                            <span aria-hidden="true">28</span>
                        </td>
                    <td class="day text-center today" data-day-timestamp="1709154000"><span class="sr-only">No events, Thursday, 29 February</span>


<a id="calendar-day-popover-link-1-2024-59-0" href="https://sbselearning.strathmore.edu/calendar/view.php?view=day&amp;time=1709154000" data-container="body" data-toggle="popover" data-html="true" data-region="mini-day-link" data-trigger="hover focus" data-placement="top" data-year="2024" data-month="2" data-courseid="1" data-categoryid="0" data-title="Today Thursday, 29 February" data-alternate="No events" aria-label="Today Thursday, 29 February" data-original-title="" title="">29</a>
<div class="hidden">

                                </div>
</td>
                    <td class="dayblank">&nbsp;</td>
                    <td class="dayblank">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-3"></span><a href="#sb-4" class="sr-only sr-only-focusable">Skip Latest announcements</a>

<section id="inst488" class=" block_news_items block  card mb-3" role="complementary" data-block="news_items" aria-labelledby="instance-488-header">

    <div class="card-body p-3">

            <h5 id="instance-488-header" class="card-title d-inline">Latest announcements</h5>


        <div class="card-text content mt-3">
            (No announcements have been posted yet.)
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-4"></span></aside>                </section>
       		     		        </div>
    </div>
</div>
<footer id="footer" class="dark1">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="footer-content flexcols">
					<div class="footer-text">
						<p>Copyright (c) Strathmore University Business School 2021. All rights reserved.</p>
													<ul class="lang-list"></ul>											</div>
                	                </div>
				     		</div>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<div class="fixed-bar">
		<a href="#" class="theme-hide-sidebar mode1 textbutton" data-showtext="Show sidebars" data-hidetext="Hide sidebars">Hide sidebars</a></div>
	<div id="header-modal-login" class="modal theme-modal-scale theme-forms login" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="theme-modal-container"><span class="close-container" data-dismiss="modal">×</span><div class="theme-loginform"><h4>Log in</h4><form id="header-form-login" method="post" action="https://sbselearning.strathmore.edu/login/index.php"><div class="form-field"><label id="user"><i class="fa fa-user"></i></label><input id="login-username" type="text" name="username" placeholder="Username"></div><div class="form-field"><label id="pass"><i class="fa fa-lock"></i></label><input id="login-password" type="password" name="password" placeholder="Password"></div><input type="submit" id="submit" name="submit" value="Log in"><input type="hidden" name="logintoken" value="BtcjnpRYPpCDFlGxIEmX6DQ71D3Zgsy6"></form><p class="login-info"><a href="https://sbselearning.strathmore.edu/login/forgot_password.php">Forgot your username or password?</a></p></div></div></div></div></div>	<div id="header-modal-search" class="modal theme-modal-scale theme-forms search" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="theme-modal-container"><span class="close-container" data-dismiss="modal">×</span><div class="theme-searchform"><div class="form-inner"><form id="theme-search" action="https://sbselearning.strathmore.edu/course/search.php"><input id="theme-searchbox" type="text" value="" placeholder="Search" name="search"><button type="submit"><i class="fa fa-search"></i></button></form></div></div></div></div></div></div>	<div id="header-modal-settings" class="modal theme-modal-scale theme-forms settings" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="theme-modal-container"><span class="close-container" data-dismiss="modal">×</span></div></div></div></div><script>
//<![CDATA[
var require = {
    baseUrl : 'https://sbselearning.strathmore.edu/lib/requirejs.php/1698178576/',
    // We only support AMD modules with an explicit define() statement.
    enforceDefine: true,
    skipDataMain: true,
    waitSeconds : 0,

    paths: {
        jquery: 'https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/jquery/jquery-3.5.1.min',
        jqueryui: 'https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/jquery/ui-1.12.1/jquery-ui.min',
        jqueryprivate: 'https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/requirejs/jquery-private'
    },

    // Custom jquery config map.
    map: {
      // '*' means all modules will get 'jqueryprivate'
      // for their 'jquery' dependency.
      '*': { jquery: 'jqueryprivate' },
      // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
      '*': { process: 'core/first' },

      // 'jquery-private' wants the real jQuery module
      // though. If this line was not here, there would
      // be an unresolvable cyclic dependency.
      jqueryprivate: { jquery: 'jquery' }
    }
};

//]]>
</script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/lib/requirejs/require.min.js"></script>
<script>
//<![CDATA[
M.util.js_pending("core/first");require(['core/first'], function() {
require(['core/prefetch']);
;
require(["media_videojs/loader"], function(loader) {
    loader.setUp(function(videojs) {
        videojs.options.flash.swf = "https://sbselearning.strathmore.edu/media/player/videojs/videojs/video-js.swf";
videojs.addLanguage('en', {
  "Audio Player": "Audio Player",
  "Video Player": "Video Player",
  "Play": "Play",
  "Pause": "Pause",
  "Replay": "Replay",
  "Current Time": "Current Time",
  "Duration": "Duration",
  "Remaining Time": "Remaining Time",
  "Stream Type": "Stream Type",
  "LIVE": "LIVE",
  "Seek to live, currently behind live": "Seek to live, currently behind live",
  "Seek to live, currently playing live": "Seek to live, currently playing live",
  "Loaded": "Loaded",
  "Progress": "Progress",
  "Progress Bar": "Progress Bar",
  "progress bar timing: currentTime={1} duration={2}": "{1} of {2}",
  "Fullscreen": "Fullscreen",
  "Non-Fullscreen": "Non-Fullscreen",
  "Mute": "Mute",
  "Unmute": "Unmute",
  "Playback Rate": "Playback Rate",
  "Subtitles": "Subtitles",
  "subtitles off": "subtitles off",
  "Captions": "Captions",
  "captions off": "captions off",
  "Chapters": "Chapters",
  "Descriptions": "Descriptions",
  "descriptions off": "descriptions off",
  "Audio Track": "Audio Track",
  "Volume Level": "Volume Level",
  "You aborted the media playback": "You aborted the media playback",
  "A network error caused the media download to fail part-way.": "A network error caused the media download to fail part-way.",
  "The media could not be loaded, either because the server or network failed or because the format is not supported.": "The media could not be loaded, either because the server or network failed or because the format is not supported.",
  "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.": "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.",
  "No compatible source was found for this media.": "No compatible source was found for this media.",
  "The media is encrypted and we do not have the keys to decrypt it.": "The media is encrypted and we do not have the keys to decrypt it.",
  "Play Video": "Play Video",
  "Close": "Close",
  "Close Modal Dialog": "Close Modal Dialog",
  "Modal Window": "Modal Window",
  "This is a modal window": "This is a modal window",
  "This modal can be closed by pressing the Escape key or activating the close button.": "This modal can be closed by pressing the Escape key or activating the close button.",
  ", opens captions settings dialog": ", opens captions settings dialog",
  ", opens subtitles settings dialog": ", opens subtitles settings dialog",
  ", opens descriptions settings dialog": ", opens descriptions settings dialog",
  ", selected": ", selected",
  "captions settings": "captions settings",
  "subtitles settings": "subtitles settings",
  "descriptions settings": "descriptions settings",
  "Text": "Text",
  "White": "White",
  "Black": "Black",
  "Red": "Red",
  "Green": "Green",
  "Blue": "Blue",
  "Yellow": "Yellow",
  "Magenta": "Magenta",
  "Cyan": "Cyan",
  "Background": "Background",
  "Window": "Window",
  "Transparent": "Transparent",
  "Semi-Transparent": "Semi-Transparent",
  "Opaque": "Opaque",
  "Font Size": "Font Size",
  "Text Edge Style": "Text Edge Style",
  "None": "None",
  "Raised": "Raised",
  "Depressed": "Depressed",
  "Uniform": "Uniform",
  "Dropshadow": "Dropshadow",
  "Font Family": "Font Family",
  "Proportional Sans-Serif": "Proportional Sans-Serif",
  "Monospace Sans-Serif": "Monospace Sans-Serif",
  "Proportional Serif": "Proportional Serif",
  "Monospace Serif": "Monospace Serif",
  "Casual": "Casual",
  "Script": "Script",
  "Small Caps": "Small Caps",
  "Reset": "Reset",
  "restore all settings to the default values": "restore all settings to the default values",
  "Done": "Done",
  "Caption Settings Dialog": "Caption Settings Dialog",
  "Beginning of dialog window. Escape will cancel and close the window.": "Beginning of dialog window. Escape will cancel and close the window.",
  "End of dialog window.": "End of dialog window.",
  "{1} is loading.": "{1} is loading.",
  "Exit Picture-in-Picture": "Exit Picture-in-Picture",
  "Picture-in-Picture": "Picture-in-Picture"
});

    });
});;
M.util.js_pending('block_navigation/navblock'); require(['block_navigation/navblock'], function(amd) {amd.init("1586"); M.util.js_complete('block_navigation/navblock');});;

require(['jquery'], function($) {
    require(['theme_boost/bootstrap/popover'], function() {
        var target = $("#calendar-day-popover-link-1-2024-59-65e05239bcd5665e05239b95c46");
        target.popover({
            content: function() {
                var source = target.next().find("> *:not('.hidden')");
                var content = $('<div>');

                if (source.length) {
                    content.html(source.clone(false));
                } else {
                    content.html(target.data('alternate'));
                }

                return content.html();
            }
        });
    });
});
;

require([
    'jquery',
    'core_calendar/selectors',
    'core_calendar/events',
], function(
    $,
    CalendarSelectors,
    CalendarEvents
) {

    $('body').on(CalendarEvents.filterChanged, function(e, data) {
        M.util.js_pending("month-mini-65e05239bcd5665e05239b95c46-filterChanged");
        // A filter value has been changed.
        // Find all matching cells in the popover data, and hide them.
        $("#month-mini-2024-2-65e05239bcd5665e05239b95c46")
            .find(CalendarSelectors.popoverType[data.type])
            .toggleClass('hidden', !!data.hidden);
        M.util.js_complete("month-mini-65e05239bcd5665e05239b95c46-filterChanged");
    });
});
;

require(['jquery', 'core_calendar/calendar_mini'], function($, CalendarMini) {
    CalendarMini.init($("#calendar-month-2024-2-65e05239bcd5665e05239b95c46"), !0);
});
;
M.util.js_pending('block_settings/settingsblock'); require(['block_settings/settingsblock'], function(amd) {amd.init("1587", null); M.util.js_complete('block_settings/settingsblock');});;
require(['theme_boost/loader']);require(['jquery','theme_boost/bootstrap/index'], function($){$('[data-toggle="tooltip"]').tooltip();$('[data-toggle="popover"]').popover()});;
M.util.js_pending('core/notification'); require(['core/notification'], function(amd) {amd.init(2, [], true); M.util.js_complete('core/notification');});;
M.util.js_pending('core/log'); require(['core/log'], function(amd) {amd.setConfig({"level":"warn"}); M.util.js_complete('core/log');});;
M.util.js_pending('core/page_global'); require(['core/page_global'], function(amd) {amd.init(); M.util.js_complete('core/page_global');});M.util.js_complete("core/first");
});
//]]>
</script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/superfish/superfish.custom.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/lightslider/lightslider.custom.min.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/OwlCarousel/owl.carousel.min.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/jarallax/jarallax.min.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/inview.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/assets/js.cookie.js"></script>
<script src="https://sbselearning.strathmore.edu/lib/javascript.php/1698178576/theme/mb2nl/javascript/theme.js"></script>
<script>
//<![CDATA[
M.str = {"moodle":{"lastmodified":"Last modified","name":"Name","error":"Error","info":"Information","yes":"Yes","no":"No","viewallcourses":"View all courses","cancel":"Cancel","morehelp":"More help","loadinghelp":"Loading...","collapseall":"Collapse all","expandall":"Expand all","confirm":"Confirm","areyousure":"Are you sure?","closebuttontitle":"Close","unknownerror":"Unknown error","file":"File","url":"URL"},"repository":{"type":"Type","size":"Size","invalidjson":"Invalid JSON string","nofilesattached":"No files attached","filepicker":"File picker","logout":"Logout","nofilesavailable":"No files available","norepositoriesavailable":"Sorry, none of your current repositories can return files in the required format.","fileexistsdialogheader":"File exists","fileexistsdialog_editor":"A file with that name has already been attached to the text you are editing.","fileexistsdialog_filemanager":"A file with that name has already been attached","renameto":"Rename to \"{$a}\"","referencesexist":"There are {$a} links to this file","select":"Select"},"admin":{"confirmdeletecomments":"You are about to delete comments, are you sure?","confirmation":"Confirmation"},"debug":{"debuginfo":"Debug info","line":"Line","stacktrace":"Stack trace"},"langconfig":{"labelsep":": "}};
//]]>
</script>
<script>
//<![CDATA[
(function() {Y.use("moodle-filter_mathjaxloader-loader",function() {M.filter_mathjaxloader.configure({"mathjaxconfig":"\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n","lang":"en"});
});
M.util.help_popups.setup(Y);
Y.use("moodle-core-popuphelp",function() {M.core.init_popuphelp();
});
Y.use("moodle-course-categoryexpander",function() {Y.Moodle.course.categoryexpander.init();
});
 M.util.js_pending('random65e05239b95c48'); Y.on('domready', function() { M.util.js_complete("init");  M.util.js_complete('random65e05239b95c48'); });
})();
//]]>
</script>


</body></html>-->