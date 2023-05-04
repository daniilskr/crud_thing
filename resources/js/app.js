import Choices from 'choices.js';
import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.choices-init').forEach((c) => new Choices(c))
 });