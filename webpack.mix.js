import { js } from 'laravel-mix';

js('resources/js/app.js', 'public/js')
   .css('resources/css/app.css', 'public/css');
