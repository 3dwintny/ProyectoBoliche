<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    @php $i =1; @endphp

    @foreach($slider as $siderites)

    <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="8000">
        @php $i++; @endphp
      <img src="{{ asset('uploads/slider/'.$siderites->image) }}" class="d-block w-100" alt="Slider image" >
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $siderites->heading }}</h5>
        <p>{{ $siderites->description }}</p>
        <a href="{{ $siderites->link }}">{{ $siderites->link_name }}</a>
      </div>
    </div>
    @endforeach
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
