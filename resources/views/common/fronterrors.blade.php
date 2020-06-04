@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alerts">
            <p style="padding: 30px 0;border: 2px solid #630000;opacity: 0.8" class="alert alert-danger text-center">
                <i style="color: #9c0000" class="fas fa-frown-open fa-2x"></i>
                <br>
                {{ $error }}
            </p>
        </div>
    @endforeach
@endif