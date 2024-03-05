<div>
    <form id="signup-form">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
            <p class="text-red-500 text-xs italic">Please choose a password.</p>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign Up
            </button>
        </div>
    </form>
</div>

<script>
    // Get data from form on submit event
    document.getElementById('signup-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Create FormData object
        const formData = new FormData(this);
        $.ajax({
            url: "controller/admin.php",
            method: "POST",
            data: {
                email: formData.get('email'),
                password: formData.get('password'),
                action: "create"
            },
        }).then((response) => {
            if (response == 202) {
                alert("User has been created");
                window.location.reload();
            } else if (response == 403){
                alert("Failed to create user");
            }
        });
    });
</script>
