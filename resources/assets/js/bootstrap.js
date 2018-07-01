
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });

const messagesNotifications = [
	"<strong class='nameUserNotifique'> %data </strong> Ha realizado una nueva <span class='typeAccionNotifi'>publicación</span>",
	"<a class='header'>¡Se ha realizado el pago a las %data</a>",
	"<strong class='nameUserNotifique'> %data </strong> Ha realizado publicado una nueva <span class='typeAccionNotifi'>foto</span>",
	"<strong class='nameUserNotifique'> %data </strong> Ha publicado una nuevo <span class='typeAccionNotifi'>documento</span>",
	"A %data </span> <span class='typeAccionNotifi'>les gusta tu publicación</span>",
	"<span class='typeAccionNotifi'> %data </span> comento tu publicacion",
	"<strong class='nameUserNotifique'>%data </strong>  Tiene una publicacion urgente <span class='typeAccionNotifi'>urgente</span>",
	"<strong class='nameUserNotifique ' > %data </strong>  actualizo su perfil",
	"<strong class='nameUserNotifique'> %data </strong> agrego un nuevo evento al calendario <span class='typeAccionNotifi'>al calendario</span>"
]