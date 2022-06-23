document.addEventListener('DOMContentLoaded', () => {
    const CarouselElements = document.querySelectorAll('.carousel');
    M.Carousel.init(CarouselElements, {
        duration: 150,
        dist: -80,
        shift: 5,
        padding: 5,
        numVisible: 3,
        indicators: true,
        noWrap: false
    });
});