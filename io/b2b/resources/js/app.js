import './bootstrap';
import Alpine from 'alpinejs';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import Swal from 'sweetalert2';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize Flatpickr for date inputs
document.addEventListener('DOMContentLoaded', function() {
    const dateInputs = document.querySelectorAll('input[type="date"], .datepicker');
    dateInputs.forEach(input => {
        flatpickr(input, {
            dateFormat: 'Y-m-d',
            allowInput: true
        });
    });
});

// Global SweetAlert2 configuration
window.Swal = Swal;

// Global utility functions
window.showSuccess = function(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 3000,
        showConfirmButton: false
    });
};

window.showError = function(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message
    });
};

window.showConfirm = function(message, callback) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed!'
    }).then((result) => {
        if (result.isConfirmed && callback) {
            callback();
        }
    });
}; 