import './bootstrap';
import './user/index.js'
import './public/posts.js'
import './public/gallery.js'
import './login/password.js'

import AOS from 'aos';
import 'aos/dist/aos.css';

if (process.env.NODE_ENV !== 'testing') {
    AOS.init({
        once: true
    });
}
