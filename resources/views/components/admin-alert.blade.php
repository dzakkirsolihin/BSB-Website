@if ($errors->has('admin_password'))
    <div id="adminAlert" class="alert alert-danger">
        {{ $errors->first('admin_password') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        const adminAlert = document.getElementById('adminAlert');
            if (adminAlert) {
                setTimeout(() => {
                    adminAlert.style.display = 'none';
                }, 1000); // Menghilangkan notifikasi setelah 1 detik
            }
    });
</script>