@if (session('success'))
    <div id="successNotification" class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        const successNotification = document.getElementById('successNotification');
        if (successNotification) {
            setTimeout(() => {
                successNotification.style.display = 'none';
            }, 2000); // Menghilangkan notifikasi setelah 2 detik
        }
    });
</script>