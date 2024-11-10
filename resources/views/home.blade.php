@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.10.7/skins/content/default/content.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.10.7/skins/ui/oxide/skin.min.css">
@endsection

@section('content')
    <div class="sidebar-and-mainbar-container">

        {{-- SIDEBAR --}}
        <div x-data="{ open: window.innerWidth >= 1024 }" class="sidebar" :style="{ width: open ? '330px' : '0' }" x-init="window.addEventListener('resize', () => { open = window.innerWidth >= 1024 })">
            <div class="sidebar-content" x-show="open">
                @foreach ($products as $product)
                    <div x-data="{ open: {{ (request()->routeIs('home.view.product') || request()->routeIs('home.view.product.feature')) && request()->route('product') === $product->route ? 'true' : 'false' }} }">
                        <p @click="open = !open;">
                            {{ $product->name }}
                        </p>
                        <ul x-show="open">
                            @foreach ($product->features as $feature)
                                <li
                                    class="{{ request()->routeIs('home.view.product.feature') && request()->route('product') === $product->route && request()->route('feature') === $feature->route ? 'activate' : '' }}">
                                    <a
                                        href="{{ route('home.view.product.feature', [$product->route, $feature->route]) }}">{{ $feature->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <div @click="open = !open" class="sidebar-button" x-text="open ? '>' : '<'"></div>
        </div>

        {{-- MAINBAR --}}
        <div class="mainbar">
            @if (isset($content) && $content)
                {!! $content !!}
            @else
                <no-content>There is no content for you to see.</no-content>
            @endif
        </div>

    </div>
@endsection
