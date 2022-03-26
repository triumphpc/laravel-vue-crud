<template>
    <div>
        <h3 class="text-center">Authorization</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="authUser" v-if="showForm">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control" v-model="user.login">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="user.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <span v-text="info"></span>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    data() {
        let info = ""
        let showForm = true;

        if (this.$auth.user().id) {
            info = "Auth by user " + this.$auth.user().name
            showForm = false
        }

        return {
            user: {},
            info,
            showForm
        }
    },
    methods: {
        /**
         * Implement auth function
         */
        authUser() {
            const app = this;

            this.$auth.login({
                params: {
                    name: app.user.login,
                    password: app.user.password
                },

                success: function () {
                    app.info = 'Auth by ' + app.user.login
                    app.showForm = false
                },
                error: function () {
                    app.info = 'Auth failed'
                },
            })
        }
    }
}
</script>
