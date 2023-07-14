
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner ">
        <div class="carousel-item active ">
            <img src="{{ asset('images/henry-co-21HT36zwLn8-unsplash.jpg') }}" class="d-block w-100 object-fit-cover" alt="cinema-image">
        </div>
        <div class="carousel-item object-fit-cover ">
            <img src="{{ asset('images/samuel-regan-asante-Geepgu8bCas-unsplash.jpg') }}" class="d-block w-100  object-fit-cover" alt="cinema-image">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/houses-cheung-3rW1HAakg8g-unsplash.jpg') }}" class="d-block w-100 object-fit-cover" alt="cinema-image">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
