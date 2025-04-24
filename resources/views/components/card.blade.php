<div class="card" style="width: 18rem;">
    @if($image)
        <img src="{{ asset($image) }}" class="card-img-top" alt="Card Image">
    @endif
    <div class="card-body">
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $slot }}</p>
      <button onclick="showAlert()" class="btn btn-primary">Show Alert</button>
    </div>
</div>

<script>
    function showAlert() {
        Swal.fire({
            title: 'Sorry',
            text: 'The products have not been added yet.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }
</script>
