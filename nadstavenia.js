const zmenaTemy = document.getElementById('zmenaTemy');

zmenaTemy.addEventListener('change', function() {
    document.body.classList.remove('svetla-tema', 'tmava-tema');

    if (this.value === 'light') {
        document.body.classList.add('svetla-tema');
    } else {
        document.body.classList.add('tmava-tema')
    }
});