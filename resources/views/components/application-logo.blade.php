@if(Auth()->check())
    <a href="/home"><h1 class="text-justify text-white" style="font-weight: 700">University Tournament System</h1></a>
@else 
    <a href="/"><h1 class="text-justify text-white" style="font-weight: 700">University Tournament System</h1></a>
@endif
