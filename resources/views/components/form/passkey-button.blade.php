<x-pwablui::form.button
    variant="secondary"
    class="w-full bg-primary-600 text-center"
    onclick="login(event)"
>
    <x-heroicon-m-key class="w-5 h-5"/>

    Use Passkey
</x-pwablui::form.button>

<script>
    const login = event => {
        event.preventDefault()

        new WebAuthn().login({
            username: document.getElementById('username').value,
        }, {
            remember: 'on',
        }).then(response => {
            location.href = '{{ route('home') }}';
        })
            .catch(error => alert('Something went wrong, try again!'))
    }

</script>