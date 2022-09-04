const form = () => ({
    init () {
        console.log('form')
    }
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
})

