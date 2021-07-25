@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <div class="page-content page-categories">
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
            </div>
          </div>
         <div class="row">
              @php
                  $incrementCategory = 0
              @endphp
            @forelse ($categories as $category)
                <div
                    class="col-6 col-md-3 col-lg-2"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementCategory += 100 }}"
                >
                    <a class="component-categories d-block" href="{{ route('categories-detail', $category->slug) }}">
                        <div class="categories-image">
                        <img
                            src="{{ Storage::url($category->photo) }}"
                            alt=""
                            class="w-100"
                        />
                        </div>
                        <p class="categories-text">
                        {{ $category->name }}
                        </p>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    No Categories Found
                </div>
            @endforelse
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
            </div>
          </div>
          <div class="row">
              @php
                  $incrementProduct = 0
              @endphp
            @forelse ($products as $product)
                <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="{{ $incrementProduct += 100 }}"
            >
              <a class="component-products d-block" href="{{ route('details', $product->slug) }}">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      @if ($product->galleries->count())
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                      @else
                        background-color: #eee
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">
                  {{ $product->name }}
                </div>
                <div class="products-price">
                  ${{ $product->price }}
                </div>
              </a>
            </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    No Products Found
                </div>
            @endforelse
          </div>
          <div class="row">
              <div class="col-12 mt-4">
                  {{ $products->links() }}
              </div>
          </div>
        </div>
      </section>
    </div>
@endsection
