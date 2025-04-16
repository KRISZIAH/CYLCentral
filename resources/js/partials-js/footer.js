document.addEventListener('DOMContentLoaded', function() {
    const scrollTopTrigger = document.getElementById('minimalScrollTop');


    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollTopTrigger.classList.add('visible');
        } else {
            scrollTopTrigger.classList.remove('visible');
        }
    });


    scrollTopTrigger.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
