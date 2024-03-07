<div>
    <form id="signup-form" class="signup-form">
        <div class="flex justify-center">
            <h1>
                Tambah Admin
            </h1>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" placeholder="Username">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
        </div>
        <div class="">
            <button class="button-primary" type="submit">
                Add
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
        if (formData.get('email') == "" || formData.get('password') == "") {
            alert("Email and password cannot be empty");
            return;
        }
        $.ajax({
            url: "controller/admin.php",
            method: "POST",
            data: {
                email: formData.get('email'),
                password: formData.get('password'),
                username: formData.get('username'),
                action: "create"
            },
        }).then((response) => {
            if (response == 202) {
                window.location.reload();
            } else if (response == 403){
                alert("Failed to create user");
            }
        });
    });
</script>
