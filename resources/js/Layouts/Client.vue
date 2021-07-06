<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <inertia-link class="navbar-brand" :href="route('welcome')"
                >WingiShop</inertia-link
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarID"
                aria-controls="navbarID"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <inertia-link
                        class="nav-link active"
                        aria-current="page"
                        :href="route('welcome')"
                        >Home
                    </inertia-link>

                    <inertia-link
                        class="nav-link"
                        aria-current="page"
                        :href="route('auth.login.show')"
                        >Login
                    </inertia-link>
                    <inertia-link
                        class="nav-link"
                        aria-current="page"
                        :href="route('auth.register.show')"
                        >Register
                    </inertia-link>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <slot />
    </div>
</template>

<script>
export default {};
</script>
