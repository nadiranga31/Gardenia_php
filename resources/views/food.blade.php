<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <br><br>
                    <h6>Our Menu</h6>
                    <h2> With quality taste</h2>
                </div>
            </div>
        </div>
    </div>
        <div class="menu-items-grid row">
            @foreach ($data as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <form action="{{ url('/addcart', $item->id) }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-img" style="background-image: url('/foodimage/{{ $item->image }}');"></div>
                        <div class="card-body">
                            <h5 class="title">{{ $item->title }}</h5>
                            <p class="price">{{ $item->price }}</p>
                            <p class="description">{{ $item->description }}</p>
                        </div>
                        <div class="card-footer">
                            <input type="number" name="quantity" min="1" value="1" style="width: 50px;">
                            <input type="submit" value="Add to Cart" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>

</section>
