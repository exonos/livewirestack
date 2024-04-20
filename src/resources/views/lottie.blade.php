@once
    <style>
        .loader {
            display: inline-block;
            width: 50px;
            height: 50px;
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }
        .loader div {
            position: absolute;
            border: 4px solid #a8a8a8;
            opacity: 1;
            border-radius: 50%;
            animation: loader 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }
        .loader div:nth-child(2) {
            animation-delay: -0.5s;
        }
        @keyframes loader {
            0% {
                top: 21px;
                left: 21px;
                width: 0;
                height: 0;
                opacity: 0;
            }
            4.9% {
                top: 21px;
                left: 21px;
                width: 0;
                height: 0;
                opacity: 0;
            }
            5% {
                top: 21px;
                left: 21px;
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                top: 0px;
                left: 0px;
                width: 42px;
                height: 42px;
                opacity: 0;
            }
        }

    </style>
@endonce


<div x-data="{ animation: null }" x-init="() => { animation = lottie.loadAnimation({
            wrapper: document.getElementById('{{$uuid}}'),
            animType: '{{$animType}}',
            loop: {{$loop ?'true' : 'false'}},
            autoplay: {{$autoplay ?'true' : 'false'}},
            @if ($path)
                path: '{{$path}}',
            @else
                animationData:  @json($data)
            @endif
        });
        @if($actions)
         create({
            mode: 'scroll',
            player: animation,
            actions: [
                {
                visibility: [0, 1],
                type: 'seek',
                frames: [0, 100],
                },
            ],
        });
        @endif
      }">
    <div style="position: relative;{{ $style }}" class="{{ $class }}">
        <div id="{{$uuid}}" style="height: 100%;min-height:100px;"></div>
    </div>
</div>
