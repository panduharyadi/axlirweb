<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach ($sliders as $key => $slider)
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" @if($key === 0) class="active" @endif aria-label="Slide {{ $key + 1 }}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach ($sliders as $key => $slider)
      <div class="carousel-item @if($key === 0) active @endif" data-bs-interval="{{ $slider->interval }}">
        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>