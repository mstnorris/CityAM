@extends('layouts.master')

@push('styles')

@endpush

@section('content')
    <div id="app">
        {{-- VueJS Component version --}}
        {{--<news-articles-container></news-articles-container>--}}

        {{-- Laravel Blade version --}}
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-4 col-sm-7 offset-sm-3 col-xs-12">
                    @foreach( $articles as $article )
                        <article>
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="card-title">{!! html_entity_decode($article->title) !!}</h3>
                                    <p class="card-text fancy">
                                        <span class="text-muted small">{{ $article->published_at->format('H:i D j M Y') }}</span>
                                    </p>
                                    <div class="card-text">{!! html_entity_decode($article->description) !!}</div>
                                </div>
                            </div>
                        </article>

                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-4 col-sm-7 offset-sm-3 col-xs-12">
                    {{ $articles->links('partials._simple-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
