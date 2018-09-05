<!DOCTYPE html>
<html>
    @foreach($head as $key => $value)
    @include('components.'.$value)
    @endforeach
    <body>
        <header>
            <div class="container">
                @foreach($header as $key => $value)
                @include('components.'.$value)
                @endforeach
            </div>
        </header>
        <section>
            <div class="container">
                <div class="row">
                    @foreach($section as $key => $value)
                    @include('components.'.$value)
                    @endforeach
                </div>
            </div>
        </section>
        <footer>
            
            @foreach($footer as $key => $value)
            @include('components.'.$value)
            @endforeach
        </footer>
    </body> 
</html>