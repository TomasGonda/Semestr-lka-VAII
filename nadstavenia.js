document.addEventListener('DOMContentLoaded', function() {
    zmenaTemy = document.getElementById('zmenaTemy');

    const ulozenaTema = localStorage.getItem('tema');

    if (ulozenaTema) {
        if (ulozenaTema === 'light') {
            document.body.classList.toggle('svetla-tema', ulozenaTema === 'light');
        } else {
            document.body.classList.toggle('tmava-tema', ulozenaTema === 'dark');
        }
        
        zmenaTemy = ulozenaTema;
    }

    zmenaTemy.addEventListener('change', function(){

        document.body.classList.remove('svetla-tema', 'tmava-tema');

        if (this.value === 'light') {
            document.body.classList.add('svetla-tema');
        } else {
            document.body.classList.add('tmava-tema');
        }

        localStorage.setItem('tema', this.value);
    });

});

