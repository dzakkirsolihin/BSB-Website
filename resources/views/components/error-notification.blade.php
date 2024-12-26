@if ($errors->any())
    <div class="alert alert-danger" id="errorNotification">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        const errorNotification = document.getElementById('errorNotification');
            if (errorNotification) {
                setTimeout(() => {
                    errorNotification.style.display = 'none';
                }, 5000); // Menghilangkan notifikasi setelah 5 detik
            }
    });
</script>