import './bootstrap';

// import ImageRemoveEventCallbackPlugin from 'ckeditor5-image-remove-event-callback-plugin'; 
import DecoupledEditor from "@ckeditor/ckeditor5-build-decoupled-document";
import Swal from 'sweetalert2'
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

window.Alpine = Alpine;
window.DecoupledEditor = DecoupledEditor;
window.Swal = Swal;

Alpine.plugin(focus);

Alpine.start();
