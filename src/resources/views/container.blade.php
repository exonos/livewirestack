  <div class="space-y-2 md:space-y-3">
    @foreach($forms as $component/* => $params*/)
        @php
           $params =  $component->props();
        @endphp

        <x-dynamic-component component="{{$component->componentName}}" :data="$params"/>
    @endforeach
</div>
