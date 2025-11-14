<!-- Flash Messages -->
@if ($errors->any())
    <div id="error-messages" class="fixed top-5 right-5 z-50 space-y-2">
        @foreach ($errors->all() as $error)
            <div class="px-4 py-3 border-l-4 rounded shadow-md bg-red-100 border-red-400 text-red-800 fixed top-5 right-5 z-50">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div id="success-message" class="fixed top-5 right-5 z-50 px-4 py-3 border-l-4 rounded shadow-md bg-green-100 border-green-400 text-green-800">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="error-messages" class="px-4 py-3 border-l-4 rounded shadow-md bg-red-100 border-red-400 text-red-800 fixed top-5 right-5 z-50">
        {{ session('error') }}
    </div>
@endif


<!-- Auto-hide after 5 seconds -->
<script>
    setTimeout(() => {
        const errorBox = document.getElementById('error-messages');
        if (errorBox) errorBox.remove();

        const successBox = document.getElementById('success-message');
        if (successBox) successBox.remove();
    }, 5000);
</script>
