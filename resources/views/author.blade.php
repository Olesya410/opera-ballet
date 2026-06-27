@extends('layouts.app')
<style>
    .content_author {
        display: grid;
        grid-template-columns: repeat(2, 1fr); 
        grid-template-rows: repeat(2, auto); 
        gap: 15px;
        padding: 20px;
        max-width: 1000px;
        margin: 0 auto;
    }
    .block {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        /* padding: 10px; */
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        /* width: 100%; */
        box-sizing: border-box;
        transition: all 0.3s ease; 
        cursor: pointer; 
    }
    .block:hover {
        background-color: #f9f9f9; 
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        transform: translateY(-2px); 
    }
    .block h1 {
        font-size: 14px; 
        margin-bottom: 8px;
        text-align: center;
        color: #333;
    }
    .image-container {
        width: 450px;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-radius: 4px;
        /* background-color: #f0f0f0; */
        margin-bottom: 8px;
    }
    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
     @media (max-width: 768px) {
    .content_author {
        grid-template-columns: 1fr;
        gap: 10px;
        padding: 15px;
    }
    .block h1 {
        font-size: 12px;
    }
    .image-container {
        width: 120px;
        height: 120px;
    }
 }

 @media (max-width: 480px) {
    .content_author {
        padding: 10px;
        gap: 8px;
    }

    .block h1 {
        font-size: 10px;
    }

    .image-container {
        width: 100px;
        height: 100px;
    }
 }
</style>

@section('content')
    <div class="content_author">
        @foreach ($authors as $author)
            <a href="{{ route('description.show', $author->id) }}">
                <div class="block">
                    <h1>{{ $author->name }}</h1>
                    <div class="image-container">
                        <img src="{{ $author->image }}" alt="{{ $author->name }}" />
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection