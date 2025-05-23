import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            console.log('Form submitted', {
                action: form.action,
                method: form.method,
                csrf: form.querySelector('input[name="_token"]')?.value,
                content: form.querySelector('textarea[name="content"]')?.value,
                parent_id: form.querySelector('input[name="parent_id"]')?.value
            });
        });
    });
});
