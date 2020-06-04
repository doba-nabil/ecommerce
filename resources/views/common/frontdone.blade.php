@if (session()->has('done'))
    <div class="alerts">
        <p style="padding: 30px 0;border: 2px solid #003200;opacity: 0.8" class="alert alert-success text-center ">
            <i style="color: #005b00" class="fas fa-smile-beam fa-2x"></i>
            <br>
            {{ session()->get('done') }}
        </p>
    </div>
@endif
@if (session()->has('error'))
    <div class="alerts">
        <p style="padding: 30px 0;border: 2px solid #500000;opacity: 0.8" class="alert alert-danger text-center">
            <i style="color: #9c0000" class="fas fa-frown-open fa-2x"></i>
            <br>
            {{ session()->get('error') }}
        </p>
    </div>
@endif