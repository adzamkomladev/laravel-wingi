<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <!-- <Link class="navbar-brand" :href="route('welcome')"
                >WingiShop</Link
            > -->
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
                    <Link
                        class="nav-link active"
                        aria-current="page"
                        :href="route('admin.dashboard')"
                        >Dashboard
                    </Link>
                    <Link
                        class="nav-link"
                        aria-current="page"
                        :href="route('admin.categories.index')"
                        >Categories
                    </Link>
                    <Link
                        class="nav-link"
                        aria-current="page"
                        :href="route('admin.brands.index')"
                        >Brands
                    </Link>
                </div>
            </div>
        </div>
    </nav>
    <slot />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { Link },
};
</script>
