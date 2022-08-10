import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let message  = document.getElementById('message')
setTimeout(function(){
 message.style.display = 'none';
},3000);