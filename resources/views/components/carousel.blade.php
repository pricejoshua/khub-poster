<div>
    {{-- @push('css') --}}
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <style>
        /* external css: flickity.css */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: sans-serif;
        }
        .carousel {
            background: transparent;
        }
        .carousel-cell {
            width: 350px;
            height: 200px;
            /* flex-box, center image in cell */
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .carousel-cell img {
            display: block;
            max-width: 100%;
            max-height: 100%;
            /* dim unselected */
            opacity: 0.7;
            -webkit-transform: scale(0.85);
            transform: scale(0.85);
            -webkit-filter: blur(5px);
            filter: blur(5px);
            -webkit-transition: opacity 0.3s, -webkit-transform 0.3s, transform 0.3s, -webkit-filter 0.3s, filter 0.3s;
            transition: opacity 0.3s, transform 0.3s, filter 0.3s;
        }
        /* brighten selected image */
        .carousel-cell.is-selected img {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-filter: none;
            filter: none;
        }
        @media screen and ( min-width: 500px ) {
            .carousel-cell {
                height: 370px;
            }
        }
        @media screen and ( min-width: 960px ) {
            .carousel-cell {
                width: 60%;
            }
        }
        /* buttons, no circle */
        .flickity-prev-next-button {
            width: 60px;
            height: 60px;
            background: transparent;
            opacity: 0.6;
        }
        .flickity-prev-next-button:hover {
            background: transparent;
            opacity: 1;
        }
        /* arrow color */
        .flickity-prev-next-button .arrow {
            fill: white;
        }
        .flickity-prev-next-button.no-svg {
            color: white;
        }
        /* closer to edge */
        .flickity-prev-next-button.previous {
            left: 0;
        }
        .flickity-prev-next-button.next {
            right: 0;
        }
        /* hide disabled button */
        .flickity-prev-next-button:disabled {
            display: none;
        }
    </style>
    {{-- @endpush --}}


    <div class="carousel js-flickity " wire:ignore>
        @foreach($items as $item)
            <div class="carousel-cell">
                <x-carousel-card
                content="{{ $item->title }}"
                backgroundUrl="{{ $item->thumbnail_url ?: 'https://www.researchgate.net/profile/Donald-Bailey-5/publication/224624453/figure/fig1/AS:393833717223438@1470908683517/Original-colour-bar-static-test-image-used-in-analogue-television-II-METHODOLOGY.png' }}"
                link="{{ URL::to('/'.$item->slug)}}">
                </x-carousel-card>
            </div>
        @endforeach
    </div>
</div>